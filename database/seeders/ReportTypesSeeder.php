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
            'name' => 'Atentado em Instituições de Ensino',
            'description' => 'Denuncie ameaças ou planejamentos de atentados em escolas, creches, faculdades ou outras instituições de ensino. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'school',
        ],
        [
            'id' => 2,
            'name' => 'Violência Contra Crianças e Adolescentes',
            'description' => 'Denuncie casos de violência, abusos, pedofilia ou qualquer violação de direitos de crianças e adolescentes. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'baby-carriage',
        ],
        [
            'id' => 3,
            'name' => 'Violência Contra Idosos',
            'description' => 'Denuncie agressões, maus-tratos ou qualquer forma de violência contra pessoas idosas. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'old',
        ],
        [
            'id' => 4,
            'name' => 'Violência Contra Mulheres',
            'description' => 'Denuncie agressões físicas, psicológicas ou outras formas de violência contra mulheres. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'woman',
        ],
        [
            'id' => 5,
            'name' => 'Violência Contra Pessoas com Deficiência',
            'description' => 'Denuncie agressões ou maus-tratos contra pessoas com deficiência. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'wheelchair',
        ],
        [
            'id' => 6,
            'name' => 'Tráfico de Drogas',
            'description' => 'Denuncie produção, transporte ou venda de drogas ilícitas. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'vaccine-bottle',
        ],
        [
            'id' => 7,
            'name' => 'Maus-Tratos a Animais',
            'description' => 'Denuncie abusos ou maus-tratos contra animais domésticos. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'paw',
        ],
        [
            'id' => 8,
            'name' => 'Crimes Ambientais',
            'description' => 'Denuncie desmatamento, poluição, caça ilegal e outros crimes ambientais. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'tree',
        ],
        [
            'id' => 9,
            'name' => 'Comércio ou Tráfico de Armas',
            'description' => 'Denuncie compra, venda ou transporte ilegal de armas e munições. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'tank',
        ],
        [
            'id' => 10,
            'name' => 'Uso de Drogas',
            'description' => 'Denuncie o uso, posse ou transporte de drogas para consumo pessoal. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'cannabis',
        ],
        [
            'id' => 11,
            'name' => 'Porte ou Posse Ilegal de Arma',
            'description' => 'Denuncie quem esteja portando ou possua armas de fogo de forma ilegal. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'shield',
        ],
        [
            'id' => 12,
            'name' => 'Procurados ou Foragidos',
            'description' => 'Denuncie o paradeiro de pessoas com mandados de prisão em aberto ou foragidas da Justiça. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'user-search',
        ],
        [
            'id' => 13,
            'name' => 'Crimes de Furto, Roubo ou Latrocínio',
            'description' => 'Denuncie casos de furto, roubo ou roubo seguido de morte. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'lock-open',
        ],
        [
            'id' => 14,
            'name' => 'Crimes de Internet',
            'description' => 'Denuncie crimes realizados por meios digitais, como golpes, fraudes ou extorsões online.',
            'icon' => 'world-www',
        ],
        [
            'id' => 15,
            'name' => 'Homicídio',
            'description' => 'Denuncie casos de assassinatos e os responsáveis. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'skull',
        ],
        [
            'id' => 16,
            'name' => 'Feminicídio',
            'description' => 'Denuncie homicídios motivados por questões de gênero, contra mulheres. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'gender-female',
        ],
        [
            'id' => 17,
            'name' => 'Receptação',
            'description' => 'Denuncie a venda ou ocultação de bens provenientes de crimes. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'shopping-bag',
        ],
        [
            'id' => 18,
            'name' => 'Jogos de Azar',
            'description' => 'Denuncie atividades ilegais como cassinos clandestinos e máquinas caça-níqueis. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'cards',
        ],
        [
            'id' => 19,
            'name' => 'Corrupção e Improbidade Administrativa',
            'description' => 'Denuncie uso indevido de recursos públicos, desvio de dinheiro ou abuso de função pública.',
            'icon' => 'currency-dollar',
        ],
        [
            'id' => 20,
            'name' => 'Crianças Desaparecidas',
            'description' => 'Denuncie informações que possam ajudar na localização de crianças desaparecidas.',
            'icon' => 'horse-toy',
        ],
        [
            'id' => 21,
            'name' => 'Crimes Contra Caixas Eletrônicos',
            'description' => 'Denuncie furtos, roubos ou explosões de caixas eletrônicos. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'cash-register',
        ],
        [
            'id' => 22,
            'name' => 'Sequestro com Extorsão',
            'description' => 'Denuncie o local do cativeiro ou informações sobre pessoas sequestradas. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'user-dollar',
        ],
        [
            'id' => 23,
            'name' => 'Adultos Desaparecidos',
            'description' => 'Denuncie informações que ajudem na localização de adultos desaparecidos.',
            'icon' => 'user-question',
        ],
        [
            'id' => 24,
            'name' => 'Manifestações',
            'description' => 'Denuncie eventos com aglomerações que possam causar transtornos ou conflitos. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'users-group',
        ],
        [
            'id' => 25,
            'name' => 'Comércio de Cerol ou Linha Chilena',
            'description' => 'Denuncie a venda ou uso de cerol e linha chilena, proibidos por lei. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'wind-electricity',
        ],
        [
            'id' => 26,
            'name' => 'Crimes Eleitorais',
            'description' => 'Denuncie irregularidades durante campanhas ou no dia das eleições. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'gavel',
        ],
        [
            'id' => 27,
            'name' => 'Invasão de Terras',
            'description' => 'Denuncie ocupações irregulares de propriedades públicas ou privadas. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'trees',
        ],
        [
            'id' => 28,
            'name' => 'Crimes de Torcidas Organizadas',
            'description' => 'Denuncie atos criminosos ligados a torcidas organizadas. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'play-football',
        ],
        [
            'id' => 29,
            'name' => 'Racismo ou Injúria Racial',
            'description' => 'Denuncie casos de discriminação racial ou injúrias baseadas na raça ou etnia. Se o crime estiver acontecendo agora, ligue no 190.',
            'icon' => 'users',
        ],
    ];


    //limpar tabela
    DB::table('report_types')->delete();

    foreach ($reportTypes as $type) {
        DB::table('report_types')->insert($type);
    }
    }
}
