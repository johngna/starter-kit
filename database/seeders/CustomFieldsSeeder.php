<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('custom_fields')->truncate();

        $customFields = [
          [
              'report_type_id' => 1, // Atentado em Instituições de Ensino
              'name' => 'Instituição Alvo',
              'type' => 'text',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 1, // Atentado em Instituições de Ensino
              'name' => 'Meio da Ameaça',
              'type' => 'text',
              'is_required' => false,
              'order' => 2,
              'is_active' => true,
          ],
          [
              'report_type_id' => 2, // Violência Contra Crianças e Adolescentes
              'name' => 'Tipo de Violência',
              'type' => 'select',
              // 'options' => json_encode(['Física', 'Sexual', 'Negligência', 'Outros']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 3, // Violência Contra Idosos
              'name' => 'Tipo de Violência',
              'type' => 'select',
              // 'options' => json_encode(['Física', 'Financeira', 'Abandono', 'Outros']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 4, // Violência Contra Mulheres
              'name' => 'Agressor Presente?',
              'type' => 'select',
              // 'options' => json_encode(['Sim', 'Não']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 5, // Tráfico de Drogas
              'name' => 'Tipo de Local',
              'type' => 'select',
              // 'options' => json_encode(['Residência', 'Rua', 'Carro', 'Outro']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 6, // Maus-Tratos a Animais
              'name' => 'Tipo de Animal',
              'type' => 'select',
              // 'options' => json_encode(['Cão', 'Gato', 'Outro']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 7, // Crimes Ambientais
              'name' => 'Natureza do Crime',
              'type' => 'select',
              // 'options' => json_encode(['Desmatamento', 'Poluição', 'Caça', 'Outros']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 8, // Comércio ou Tráfico de Armas
              'name' => 'Tipo de Arma',
              'type' => 'text',
              'is_required' => false,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 9, // Procurados ou Foragidos
              'name' => 'Nome ou Apelido',
              'type' => 'text',
              'is_required' => false,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 10, // Crimes de Internet
              'name' => 'Meio Usado',
              'type' => 'text',
              'is_required' => false,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 11, // Feminicídio
              'name' => 'Histórico de Violência',
              'type' => 'select',
              // 'options' => json_encode(['Sim', 'Não']),
              'is_required' => false,
              'order' => 1,
              'is_active' => true,
          ],
      ];


      DB::table('custom_fields')->insert($customFields);
    }
}
