<?php

namespace App\Functions;

use DB;
use Auth;
use File;
use App\User;

class Helper
{
    public static $langs = [
        'en' => [
            'my' => 'My',
            'vision' => 'vision',
            'my_visioin_text' => 'AAbove represents a personal and societal journey that serves to achieve greater common good. I would like to offer the people of my country an opportunity to make an investment that is not only lucrative but also seeks to promote welfare for those in desperate need. We can work together to create a world in which those who have a lot to give and those who have less unite to support those who have nothing at all. After achieving great success in the blockchain industry over the past 12 years, I now want to dedicate my time, knowledge, and expertise to helping others partake in a philanthropic investment that truly benefits all.',
            'my_visioin_heading' => 'Ultimately, consider AAbove an invitation to go beyond.',
            'my_fr' => 'My',
            'goal' => 'Goal',
            'achive_it' => 'and I will achieve it...',
            'goal_line_1' => 'Any investment is guaranteed by a certain degree of trust, I absolutely want to be clear in reassuring you, potential investors that my offer to go beyond with AAbove is without risk.',
            'goal_line_2' => 'My goal is to double the invested amounts within a three-year time period.',
            'goal_line_3' => 'The profit structure prioritizes our investors, who I aim to provide with the first 50% of net profit in addition to initial investments by the 1st of January 2026. Any subsequent net profit, between 50% and 100%, will be dedicated to people in need. Only if net profit exceeds 100% will I be compensated for my dedication to this journey.',
            'my_guarantees' => 'My Guarantees',
            'my_guarantees_text_1' => 'For many, the minimum investment required is a sum hard to spare. Given this, I want to provide investors with a flexibility and understanding that is often lacking in the investment process. I assure that those who choose to invest €1.000 will be guaranteed the return on their investment in addition to a minimum return of 25%.',
            'my_guarantees_text_2' => 'This offer is valid up to a combined aggregated amount of €1 billion.',
            'my_guarantees_text_3' => 'Furthermore, I guarantee that investors who invest €1.000 may request a return of their investment in case personal or financial troubles arise and the investment becomes a burden. Investors will receive their money within 72 hours.',
            'my_promise' => 'My Promise',
            'my_promise_sub' => 'The invitation I gladly send is an invitation to all.',
            'my_promise_text_1' => 'To the individuals who already invest frequently,',
            'my_promise_text_2' => 'the people who hold great wealth and are intrigued by the world of blockchain, and to those who are willing to invest even when money is hard to spare, I welcome you to this journey and I offer you my complete dedication to not only assist you in increasing your personal wealth but also help you contribute to doing good for those who are less fortunate. While I want to give a special thanks to those who invest greater fortunes and allow for greater play in profit creation, I also want to emphasize that each and every investor is appreciated. For those who are willing to embark on this journey with me, I promise you a once-in-a-lifetime opportunity to do good for yourself while doing good for others.',
            'home' => 'My Vision',
            'mygoals' => 'My Goals',
            'investment_options' => 'Investment Options',
            'go_beyond' => 'Go beyond with AAbove.',
            'investment_line' => 'This investment category requires a 10,000 deposit and an interview.',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'amount' => 'Amount to invested',
            'country' => 'Country',
            'number' => 'Phone Number',
            'id_number' => 'ID Number/Passport',
            'documentation' => 'Picture of Documentation',
            'submit' => 'Submit',
            'contact_us' => 'Fill your Details',
            'contact_us_text' => 'Please provide the valid information for KYC',
            'package_2_deposit_text' => 'An Amount of 10,000 will be charged as a deposit (refundable) for this investment'
        ],
        'fr' => [
            'my' => 'Ma',
            'vision' => 'Vision',
            'my_visioin_text' => 'Aabove sacralise à la fois un parcours personnel, financier et sociétal qui a pour fin d’atteindre un bien commun plus grand dans un univers que je maîtrise totalement. Je vous offre, à vous, habitant de mon pays, la possibilité d’ investir, non seulement dans leur propre avenir, mais aussi dans un avenir meilleur et solidaire.Nous allons travailler ensemble pour créer un monde dans lequel ceux qui ont beaucoup à investir, ou à l’inverse peu, pourront protéger leur surface financière et leur profit, tout en soutenant ceux qui ont moins et ceux qui ne possèdent rien. Après avoir connu un franc succès dans l‘industrie de la blockchain au cours de ces 12 dernières années, je souhaite désormais consacrer tout mon temps, toutes mes connaissances, toute mon influence sur les Marchés ainsi que ma force de frappe financière à vous aider à générer une richesse durable qu’elle soit financière mais aussi humaine.',
            'my_visioin_heading' => 'AABOVE”est tout simplement une invitation à aller au-delà TOUS ENSEMBLE.',
            'my_fr' => 'Mon',
            'goal' => 'Objectif',
            'achive_it' => 'et je l’atteindrai...',
            'goal_line_1' => 'Tout investissement a pour gage un certain degré de confiance, je tiens absolument à être clair en vous rassurant, vous, investisseurs potentiels que mon offre d‘aller au-delà avec AAbove est sans risque.',
            'goal_line_2' => 'Je doublerai les montants investis dans un délai de trois ans.',
            'goal_line_3' => 'Le 1er janvier 2026, je livrerai les premiers 50% des bénéfices nets des investisseurs, en plus des investissements initiaux. À partir de ce jour, si un profit plus conséquent a été généré, les bénéfices nets suivants au-dessus de 50% seront dédiés aux personnes dans le besoin. Les coûts de AABOVE seront à ma charge personnelle durant cette période d’investissement et uniquement couverts sur les profits réalisés qui dépasseraient les 100%.',
            'my_guarantees' => 'Mes garanties',
            'my_guarantees_text_1' => 'Je suis conscient que pour beaucoup, l’investissement minimum requis de € 1.000  est une somme conséquente à épargner et à investir. Aussi, je tiens à vous assurer que celui qui choisit d’investir €1.000 aura la garantie du retour de son investissement ainsi qu’un rendement minimum de 25% sur 3 ans',
            'my_guarantees_text_2' => 'J’alloue pour cela une somme de $1 milliard pour couvrir cette promesse',
            'my_guarantees_text_3' => 'En plus de ces avantages, j’offre en exclusivité aux investisseurs de €1.000 la possibilité de leur restituer leur investissement en cas de difficultés personnelles ou financières. Ces derniers recevront leur argent sous 72 heures.',
            'my_promise' => 'Ma Promesse',
            'my_promise_sub' => 'Vous êtes tous invités.',
            'my_promise_text_1' => 'Aux personnes qui investissent déjà fréquemment,',
            'my_promise_text_2' => ' aux personnes qui détiennent une grande richesse et qui sont intriguées par le monde de la blockchain, et à celles qui sont prêtes à investir même lorsque l’argent est difficile à épargner, je vous souhaite la bienvenue  et je vous offre mon dévouement total non seulement pour vous aider à augmenter votre richesse personnelle, mais aussi pour vous aider à contribuer à faire du bien à ceux qui sont moins fortunés. Bien que je souhaite remercier tout particulièrement ceux qui investissent de plus grandes fortunes et permettent d‘ obtenir  d‘ avantage dans la création de profits, je tiens également à souligner que chaque investisseur est apprécié, et j‘ insiste pour ceux qui sont prêts à se lancer dans AABOVE avec moi…je vous promets une opportunité unique pour tous: Nous irons  bien au-delà avec AAbove.',
            'home' => 'Ma vision',
            'mygoals' => 'Mon objectif',
            'investment_options' => 'Options d’investissement',
            'go_beyond' => 'AABOVE, vous et moi.',
            'investment_line' => 'Cette catégorie d’investissement nécessite un dépôt de 10 000 et une entrevue.',
            'name' => 'Nom',
            'email' => 'Email',
            'address' => 'Adresse',
            'amount' => 'Montant à investir',
            'country' => 'Pays',
            'number' => 'Numéro de téléphone',
            'id_number' => 'Numéro d’identification/Passeport',
            'documentation' => 'Image de la documentation',
            'submit' => 'Soumettre',
            'contact_us' => 'Nous contacter',
            'contact_us_text' => 'Veuillez fournir les informations valides pour KYC',
            'package_2_deposit_text' => 'Un montant de 10 000 sera facturé à titre d’acompte (remboursable) pour cet investissement'
        ]
    ];

    public static function ifUserHasImage($logo)
    {
        if ($logo == '' || $logo == null) {
            return false;
        }
        if (File::exists(public_path('storage' . $logo))) {
            return 'storage' . $logo;
        } else {
            return false;
        }
    }


    public static function getMillionCount()
    {
        $count = User::where('role_id', 4)->where('is_premium', true)->count();
        return $count;
    }

    public static function _lang(String $property): string
    {
        $lang = 'en';
        if(isset($_GET['ln']) && !empty($_GET['ln'])){
            $lang = $_GET['ln'];
        }
        return self::$langs[$lang][strtolower($property)] ?? '';
    }
}
