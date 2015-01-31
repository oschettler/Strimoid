<?php namespace Strimoid\Models\Folders;

use Strimoid\Models\FakeFolder;

class Popular extends FakeFolder {

    protected function getBuilder($model)
    {
        $builder = with(new $model)->newQuery();

        $groups = [
            'Nauka',
            'NiezlaStronkaWSieci',
            'ciekawostki',
            'Humor',
            'Linux',
            'Gry',
            'Technika',
            'programowanie',
            'CiekaweMiejsca',
            'Historia',
            'Security',
            'LifeHack',
            'Ksiazki',
            'Matematyka',
            'FotoHistoria',
            'Polska',
            'Internet',
            'Fizyka',
            'FilmyDokumentalne',
            'EarthPorn',
            'Android',
            'Herbata',
            'obrazki',
            'Film',
            'Informatyka',
            'GryTradycyjne',
            'Polandball',
            'Mapy',
            'Fantastyka',
            'TED',
            'Astronomia',
            'humorInformatyczny',
            'Seriale',
            'Fotografia',
            'Kultura',
            'UrbanPorn',
            'FortPorn',
            'Psychologia',
            'DIY',
            'webdev',
            'webdesign',
            'Polskie',
            'krajobrazy',
            'ekonomia',
            'bitcoin',
            'Wszechświat',
            'pingwiny',
            'kursprogramowania',
            'gify',
            'audio',
            'sztuka',
            'metasecurity',
            'technologia',
            'truelolcontent',
            'cytaty',
            'PogaduchyElita',
            'słowodnia',
            'reddit',
            'OpenStreetMap',
            'infografiki',
            'LosowaWikipedia',
            'TIL',
            'Mozilla',
            'prywatnosc',
            'jezyk',
            'pogadachy',
            'muzyka',
            'RowerowyRównik',
            'sugestie',
            'wykop',
            'oswiadczenie',
            'strimoid',
            'pytanie',
            'FirstWorldProblems',
            'zwierzeta',
            'szachy',
            'Polskie_krajobrazy',
            'gitara',
            'finanse',
            'BirdwatchingPtaki',
            'piractwo',
            'SztucznaInteligencja',
            'programujmy',
            'TheBestOfStrimoid',
            'networking',
            'SpiewajZeStrimoidem',
            'reklama',
            'Zdrowie',
            'Polityka',
            'MetaSecurity',
            ];

        $builder->whereIn('group_id', $groups);

        return $builder;
    }

    public function contents($tab = null, $sortBy = null)
    {
        $builder = static::getBuilder('Strimoid\Models\Content');

        if ($tab == 'new')
        {
            $builder->frontpage(false);
        }
        elseif ($tab == 'popular')
        {
            $builder->frontpage(true);
            $sortBy = $sortBy ?: 'frontpage_at';
        }

        $builder->orderBy($sortBy ?: 'created_at', 'desc');

        return $builder;
    }

}
