<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $reportTypes = [
        [
            'id' => 1,
            'name' => 'Crimes Contra a Pessoa',
            'description' => 'Violência doméstica e familiar, abuso ou exploração sexual, maus-tratos a idosos ou pessoas com deficiência, bullying ou violência escolar.',
            'icon' => 'user-off',
        ],
        [
            'id' => 2,
            'name' => 'Crimes Contra o Patrimônio',
            'description' => 'Roubo e furto, receptação de bens roubados, vandalismo ou depredação de patrimônio público.',
            'icon' => 'building-bank',
        ],
        [
            'id' => 3,
            'name' => 'Crimes Ambientais',
            'description' => 'Desmatamento ilegal, caça e pesca predatória, poluição de rios e mares, comércio ou posse de animais silvestres sem autorização.',
            'icon' => 'tree',
        ],
        [
            'id' => 4,
            'name' => 'Crimes de Corrupção',
            'description' => 'Desvios de recursos públicos, pagamento ou recebimento de propinas, nepotismo, fraudes em licitações.',
            'icon' => 'currency-dollar',
        ],
        [
            'id' => 5,
            'name' => 'Tráfico e Crimes Relacionados',
            'description' => 'Tráfico de drogas, tráfico de armas, tráfico de pessoas, contrabando ou descaminho.',
            'icon' => 'truck-delivery',
        ],
        [
            'id' => 6,
            'name' => 'Abandono ou Negligência',
            'description' => 'Abandono de incapaz, trabalho infantil, situações de mendicância ou exploração de crianças.',
            'icon' => 'alert-triangle',
        ],
        [
            'id' => 7,
            'name' => 'Violência Urbana',
            'description' => 'Ameaças ou agressões físicas, facções criminosas ou organizações ilícitas, porte ilegal de armas.',
            'icon' => 'shield-lock',
        ],
        [
            'id' => 8,
            'name' => 'Denúncias Contra Estabelecimentos',
            'description' => 'Funcionamento irregular de empresas, comercialização de produtos adulterados ou contrabandeados, práticas abusivas em relações de consumo.',
            'icon' => 'building',
        ],
        [
            'id' => 9,
            'name' => 'Denúncias Relacionadas à Saúde Pública',
            'description' => 'Maus-tratos em hospitais, asilos ou clínicas, negligência em atendimento médico, comercialização irregular de medicamentos.',
            'icon' => 'first-aid-kit',
        ],
        [
            'id' => 10,
            'name' => 'Outras Denúncias Gerais',
            'description' => 'Denúncias eleitorais, trabalhos forçados ou análogos à escravidão, desrespeito a leis de acessibilidade.',
            'icon' => 'circle-plus',
        ],
    ];

    //limpar tabela
    DB::table('report_types')->delete();

    foreach ($reportTypes as $type) {
        DB::table('report_types')->insert($type);
    }
    }
}
