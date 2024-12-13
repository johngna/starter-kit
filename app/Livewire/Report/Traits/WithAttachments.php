<?php

namespace App\Livewire\Report\Traits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

trait WithAttachments
{
    use WithFileUploads;

    public $attachments = [];
    public $temporaryAttachments = [];
    protected $maxFileSize = 10240; // 10MB em kilobytes
    protected $allowedFileTypes = [
        'application/pdf',
        'image/jpeg',
        'image/png',
        'image/jpg',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    public function updatedTemporaryAttachments()
    {
        $this->validate([
            'temporaryAttachments.*' => [
                'file',
                'max:' . $this->maxFileSize,
                'mimes:pdf,doc,docx,jpg,jpeg,png'
            ]
        ], [
            'temporaryAttachments.*.file' => 'O arquivo deve ser válido',
            'temporaryAttachments.*.max' => 'O arquivo não pode ser maior que 10MB',
            'temporaryAttachments.*.mimes' => 'O arquivo deve ser do tipo: PDF, DOC, DOCX, JPG, JPEG ou PNG'
        ]);

        foreach ($this->temporaryAttachments as $attachment) {
            $this->attachments[] = [
                'name' => $attachment->getClientOriginalName(),
                'size' => $this->formatFileSize($attachment->getSize()),
                'type' => $attachment->getMimeType(),
                'path' => $attachment->store('temp/attachments', 'public')
            ];
        }

        $this->temporaryAttachments = [];
    }

    public function removeAttachment($index)
    {
        if (isset($this->attachments[$index])) {
            Storage::disk('public')->delete($this->attachments[$index]['path']);
            unset($this->attachments[$index]);
            $this->attachments = array_values($this->attachments);
        }
    }

    protected function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, 2) . ' ' . $units[$pow];
    }

    protected function saveAttachments($report)
    {
        foreach ($this->attachments as $attachment) {
            $finalPath = "reports/{$report->id}/" . basename($attachment['path']);

            Storage::disk('public')->move($attachment['path'], $finalPath);

            $report->attachments()->create([
                'name' => $attachment['name'],
                'path' => $finalPath,
                'type' => $attachment['type'],
                'size' => $attachment['size']
            ]);
        }

        // Limpa os anexos temporários
        $this->attachments = [];
    }

    protected function cleanupTemporaryFiles()
    {
        foreach ($this->attachments as $attachment) {
            Storage::disk('public')->delete($attachment['path']);
        }
        $this->attachments = [];
    }
}
