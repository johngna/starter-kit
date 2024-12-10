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
              'report_type_id' => 1, // Crimes Contra a Pessoa
              'name' => 'Nome da Vítima',
              'type' => 'text',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 1, // Crimes Contra a Pessoa
              'name' => 'Idade da Vítima',
              'type' => 'number',
              'is_required' => false,
              'order' => 2,
              'is_active' => true,
          ],
          [
              'report_type_id' => 2, // Crimes Contra o Patrimônio
              'name' => 'Endereço do Local do Crime',
              'type' => 'text',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 2, // Crimes Contra o Patrimônio
              'name' => 'Descrição do Bem Furtado',
              'type' => 'textarea',
              'is_required' => true,
              'order' => 2,
              'is_active' => true,
          ],
          [
              'report_type_id' => 3, // Crimes Ambientais
              'name' => 'Localização Geográfica',
              'type' => 'text',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 3, // Crimes Ambientais
              'name' => 'Tipo de Crime Ambiental',
              'type' => 'select',
              // 'options' => json_encode(['Desmatamento', 'Poluição', 'Comércio de Animais']),
              'is_required' => true,
              'order' => 2,
              'is_active' => true,
          ],
          [
              'report_type_id' => 4, // Crimes de Corrupção
              'name' => 'Descrição da Irregularidade',
              'type' => 'textarea',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 5, // Tráfico e Crimes Relacionados
              'name' => 'Tipo de Tráfico',
              'type' => 'select',
              // 'options' => json_encode(['Drogas', 'Armas', 'Pessoas']),
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 6, // Abandono ou Negligência
              'name' => 'Descrição da Situação',
              'type' => 'textarea',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 7, // Violência Urbana
              'name' => 'Arma Utilizada',
              'type' => 'text',
              'is_required' => false,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 8, // Denúncias Contra Estabelecimentos
              'name' => 'Nome do Estabelecimento',
              'type' => 'text',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 9, // Denúncias Relacionadas à Saúde Pública
              'name' => 'Nome da Instituição de Saúde',
              'type' => 'text',
              'is_required' => true,
              'order' => 1,
              'is_active' => true,
          ],
          [
              'report_type_id' => 10, // Outras Denúncias Gerais
              'name' => 'Tipo de Denúncia',
              'type' => 'text',
              'is_required' => false,
              'order' => 1,
              'is_active' => true,
          ],
      ];

      DB::table('custom_fields')->insert($customFields);
    }
}
