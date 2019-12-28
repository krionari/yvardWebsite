<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
                  ['email' => 'david@gmail.com',
                      'roles' => ['ROLE_ADMIN'],
                      'primarySkill' => ['chanteur'],
                      'otherSkills' => ['auteur', 'compositeur', 'interprète'],
                      'firstname' => 'David',
                      'lastname' => 'M. Thurisaz',
                      'password' => 'admin',
                      'description' => 'D’origine nantaise, David M. Thurisaz, est bercé au diapason de la musique francophone dès son plus jeune âge. Passionné par la culture musicale bretonne, il puise son énergie au son des groupes de rock celtes et du charisme de The Pogues, EV ou Matmatah.<br>
                       Né en même temps que l’émergence du punk rock, il s’enivre des mélodies des Bérus, de Mano Solo et d’un rock plus alternatif Mano Negra ou Les garçons bouchers endiablent ses nuits jusqu’au petit matin.<br>
                       Auteur, compositeur et interprète, Thurisaz nous transporte dans un univers profondément réaliste. Il revendique son appartenance à son pays, la France. C’est un fervent adepte de la chanson porteuse de sens dont les mots reflètent le vécu. Il s’abreuve des écritures de grands paroliers tels que Bashung, Miossec ou Biolay. Ses influences cantatiennes et saeziennes le poussent à écrire encore et toujours ce qu’il appelle « la vie tout simplement ».<br>
                       Il ne conçoitppas la musique comme un apprentissage scolaire ; il préfère la vivre. C’est avec la guitare acoustique prêtée par son regretté oncle Alain qu’il s’exerce et sort ses premiers sons. Ses lignes d’écriture naissent alors au rythme de ses notes. Au début des années 90, il goûte aux joies de la composition musicale au sein du groupe gospel Two Whites. Le quatuor se produit à plusieurs reprises jusqu’à sa dissolution en 1995.<br>
                       David M. Thurisaz commence alors à jouer et à chanter en solo. Sa guitare ne le lâchant jamais, il chante et joue sa vie. Il donne de la voix devant ceux qui passent et qui s’arrêtent pour l’écouter. Il s’abreuve sans cesse des histoires existentielles qui font de lui un écorché vif.<br>
                       Chanteur des jours à bannir, poète aux doigts abîmés par tant d’horribles cauchemars venus noircir son papier, il retrouve sur les chemins de la vie Kris Yera, son ami de toujours.<br>
                       En 2016, ils décident de former le groupe YVARD. Un premier EP de 5 titres, «Vue d’ici», voit le jour.<br>
                       En 2017, David M. Thurisaz rencontre via les réseaux sociaux, Yan Ingwaz, auteur, compositeur et interprète. L’accroche se fait dès la première entrevue. Ils s’affairent à retravailler l’EP déjà réalisé afin de le rendre plus rock. Ingwaz, guitariste hors pair et choriste à la voix cristalline, s’imprègne des titres et embellit magnifiquement les compositions.<br>
                       Soucieux de joindre à son projet des personnes fidèles aux valeurs sûres, Thurisaz se tourne vers Jul Fheu, guitariste autodidacte au jeu troublant de sincérité et Jérémy Gebo, bassiste de formation, qui intègre rapidement les rangs. Romain Als. Raido, batteur increvable aux tonalités rock dures, les rejoint pour faire majestueusement vibrer ses peaux. Enfin, Thurisaz invite Erick dit « Uruz », ami de longue haleine, à accompagner son chant de sa voix rocailleuse et à donner de la profondeur aux compositions grâce à son jeu poignant au synthé.'
                  ],

                  ['email' => 'romain@gmail.com',
                      'roles' => ['ROLE_USER'],
                      'primarySkill' => ['batteur'],
                      'otherSkills' => [],
                      'firstname' => 'Romain',
                      'lastname' => 'Als. Raido',
                      'password' => 'user',
                      'description' => 'Romain Als dit « Raido » est le batteur du groupe. Élevé dès son plus jeune âge au son hard rock de groupes tels que Trust, Led Zeppelin, AC/DC et bien d\'autres, il commence à taper sur les fûts à l\'âge de 6 ans. Il apprend les rudiments de la batterie à travers la méthode Agostini jusqu\'à 13 ans. Il quitte les cours et intègre une formation jazz dans le but de pouvoir jouer avec d\'autres musiciens.<br>
                       Durant deux ans, il se familiarise avec la scène en donnant de petites représentations mais le manque d’attrait pour les morceaux joués le pousse à mettre un terme à la formation. Avec des amis, il décide de se tourner vers un style plus punk voire métal à l’image des groupes anglo-saxons qu’il adore Blink 182, Sum 41, Foo Fighters ou encore Iron maiden. Il laisse ensuite de côté la batterie pour se consacrer à ses études.<br>
                       Après 9 ans de diètes rythmiques, il redécouvre son instrument de prédilection à travers de nouveaux groupes (Periphery, Meshuggah) et le merveilleux album « The joy of motion » de Animals as Leaders qui lui donne des frissons. Il se remet à jouer et à s\'entraîner jusqu’à développer la polyrythmie et le jeu à la double pédale qu’il ne connaissait pas.<br>
                       Après 2 ans de solo, le besoin de rejoindre un groupe se fait sentir. Il crée une chaîne Youtube pour diffuser quelques covers et se faire connaître , ce qui lui permet d’intégrer YVARD.'
                  ],

                  ['email' => 'jujfeu@gmail.com',
                      'roles' => ['ROLE_USER'],
                      'primarySkill' => ['guitariste'],
                      'otherSkills' => [],
                      'firstname' => 'Juj',
                      'lastname' => 'Fheu',
                      'password' => 'user',
                      'description' => 'Guitariste à dominante rythmique, Jul Fheu puise son jeu dans les riffs du hard rock des années 90. Il a toujours été bercé par le génie de Queen et la folie addictive des Guns\'n\'roses, Motley Cruë, Mr Big, Pantera et autres marginaux du rock dur. Le jeu de scène d’icônes comme Slash, Paul Gilbert (pour ne citer qu’eux) a permis à ce gaucher de trouver l’inspiration, la motivation et l’énergie nécessaires à l’autodidaxie.<br>
                       Une première tentative à l’adolescence l’avait pourtant contraint à laisser au placard cette sauvage bien difficile à ferrer. Ce n’est qu’avec le temps et un âge supposé plus « sage » que ses rêves de rock star ravivent le remord d’avoir trop vite abandonné.<br>
                       Une rencontre aussi insolite que fulgurante le conduit à dépoussiérer la mutine à cordes ; l\'entraînant comme une traînée de poudre dans sa première formation musicale.<br>
                       Orientée sur des reprises hard métal, la bande est mise brièvement sous les feux de la rampe pour une dizaine de concerts dans des bars et festivals de l\'agglomération bordelaise. Finalement, ne partageant pas les mêmes valeurs que les autres membres, Fheu finit par partir.<br>
                       En raison d\'une amitié grandissante basée sur l\'honnêteté et le respect, il lui parait évident de saisir l’opportunité de rejoindre la formation YVARD. Sensible à l’esprit fraternel du créateur du groupe et aux mélodies et textes accrocheurs, il prend le parti d’en devenir, lui aussi, un des artisans. Libre d’apporter sa touche personnelle et un peu de lui, il délivre un punch rythmique et des thèmes engagés.'
                  ],

                  ['email' => 'yanIngwaz@gmail.com',
                      'roles' => ['ROLE_USER'],
                      'primarySkill' => ['guitariste', 'choriste'],
                      'otherSkills' => ['auteur', 'compositeur'],
                      'firstname' => 'Yan',
                      'lastname' => 'Ingwaz',
                      'password' => 'user',
                      'description' => 'Yan Ingwaz voue un culte à la guitare électrique. Tout commence en 1991. Alors âgé de 10 ans, il est interpellé par un groupe français qui passe sur les ondes. Le refrain, « Ça, c\'est vraiment toi", ne laisse pas le petit bonhomme indifférent. L\'amour pour la mélodie du rock ne nait véritablement que trois ans plus tard, lorsqu’une chaîne de télévision française diffuse un concert de The Rolling Stones. Au cours de l’année 95, un album le frappe en plein cœur. « These Days » de Bon Jovi est alors usé à trois reprises.<br>
                       Il lui faut peu de temps pour réaliser à quel point il est attiré par la guitare. Ses parents lui offrent sa première Epiphone à l’âge de 15 ans. Il commence par apprendre le fonctionnement de cet instrument inconnu grâce à des partitions gentiment prêtées. « Back in black » (AC/DC), « Should I stay or should I go » (The Clash) et « Un jour en France » (Noir Désir) n’ont plus aucun secret pour lui. Son talent est révélé.<br>
                       Bientôt, il ne fait plus qu’un avec la musique rock et le disque devient sa passion : les titres de Led Zep, Deep Purple, Aerosmith, AC/DC, Noir Désir, Springsteen, Bon Jovi, Téléphone, … tournent en boucle. Il continue à travailler en autodidacte les titres de ses groupes favoris ; ce qui reste la meilleure méthode pour apprendre la métrique et l\'écoute des autres instruments. Après avoir détruit les tympans de ses parents à jouer sans cesse les mêmes morceaux, son ami d\'enfance, batteur, lui propose de se joindre à un groupe.<br>
                       De 1999 à 2005, il évolue ainsi au sein de plusieurs formations dans le Bordelais. En 2006 il s\'installe au Pays Basque. Il crée le groupe Jokangely avec Jis. Il passe quelques belles années à jouer dans les bars basques, les Écuries de Baroja, le caveau des Augustins, des manifestations couvertes par France Bleu...<br>
                       En 2013, le groupe donne son ultime concert sous les étoiles de Pomarez, retransmis sur France 3. Ces quelques années lui permettent de belles rencontres : Colette Dechaume (France Bleu), Louis Bertignac, Olivier Daguerre et Michel Moussel, Anne Etchegoyen. En 2014, il revient sur Bordeaux. Rapidement, l’appel du rock se fait de nouveau sentir. En 2017, il met en avant ses talents de guitariste-compositeur dans une annonce sur internet. Il est repéré par Thurisaz et intègre l’aventure YVARD.'
                  ],

                  ['email' => 'jeremyGebo@gmail.com',
                      'roles' => ['ROLE_USER'],
                      'primarySkill' => ['basse'],
                      'otherSkills' => [],
                      'firstname' => 'Jérémy',
                      'lastname' => 'Gebo',
                      'password' => 'user',
                      'description' => 'Né en Allemagne, Jérémy Gebo est bercé dès son plus jeune âge par le rock, le blues et le métal, très présents au sein du cocon familial. Voyageur musical, il est transcendé par l’exploitation de la basse des groupes de rock alternatif japonais prenant la forme du noise rock.<br>
                       Il s’inspire principalement du « visual kei » et prend pour modèles Tetsu (L’Arc en Ciel) ou encore de Reita (The Gazette). Il fait ses armes durant les années lycée et université où il évolue autour de divers projets musicaux qui l’amènent à se produire sur des scènes locales.<br>
                       En 2017, l’autodidacte aux accents nippons découvre le projet YVARD et accepte de poser ses sonorités; choix qui ne relève pas du hasard puisque son frère manie le même instrument. Sa connaissance des purs groupes rock français des années 90 lui permet de trouver sa place à travers un jeu mélodique couplé à des percussions.<br>
                       Toujours à la recherche de nouvelles sonorités, sa présence donne de la force au groupe et son jeu authentique embellit harmonieusement les textes d’YVARD. Gebo, l’explorateur rock des temps modernes que le soleil levant a affûté, complète le groupe avec un phrasé musical qui ne va pas sans rappeler celui de Thurisaz.'
                  ],

                  ['email' => 'emileUruz@gmail.com',
                      'roles' => ['ROLE_USER'],
                      'primarySkill' => ['clavier', 'synthés', 'choriste'],
                      'otherSkills' => [],
                      'firstname' => 'Emile',
                      'lastname' => 'dit "Uruz"',
                      'password' => 'user',
                      'description' => 'Emile dit « Uruz » a forgé sa musicalité au son des groupes punk et rock des années 80 et 90. De Ludwig von 88, en passant par Noir Désir ou encore Led Zeppelin, ses influences sont variées. Cela lui permet de créer un large éventail de lignes musicales sur son clavier, instrument pour lequel il voue un véritable attachement.<br>
                       Ami de longue date avec Thurisaz, il est l’un des derniers à intégrer le groupe YVARD. C’est à l’écoute des premiers enregistrements studio qu’a lieu le coup de foudre. Les textes captivants et authentiques posés sur des mélodies claquantes font battre son âme musicale.<br>
                       Il décide alors de relever un véritable défi : amener des sonorités d’un autre genre aux compositions pour leur donner une profondeur certaine. Malgré son manque d’expérience en la matière, il fait preuve d’une détermination sans faille dans l’art de la composition musicale. Par son timbre de voix rocailleux et puissant, il ne laisse pas insensible les oreilles de Thurisaz, qui voit en lui un potentiel à exploiter et lui demande de l’accompagner au chant.<br>
                       Si on pouvait résumer Uruz en une phrase, on pourrait dire : « Uruz ou l’histoire d’un homme investi par la fougue et la persévérance de vivre les émulsions du cœur et les vibrations d’un rock pur oublié ».'
                  ],

                  ['email' => 'krisYera@gmail.com',
                      'roles' => ['ROLE_USER'],
                      'primarySkill' => ['synhthés'],
                      'otherSkills' => ['arrangeur', 'ingé sons'],
                      'firstname' => 'Kris',
                      'lastname' => 'Yera',
                      'password' => 'user',
                      'description' => 'Au début des années 80, le bordelais Kris Yera fait partie intégrante du mouvement batcave. Il évolue ensuite vers des sons dark électro tout en suivant la vague industrielle de l’EBM (Electronic Body Music). Il renouvelle en permanence ses explorations musicales et aborde l’univers du punk rock français.<br>
                       Toujours à contre-courant de la tendance musicale française grand public , son univers artistique évolue sans cesse vers des styles en pleine mutation. Son intérêt pour les sons électroniques le pousse à vouloir créer sa propre musique : il crée de nouvelles sonorités et de nouveaux rythmes toujours plus rapides. Toutes ses mouvances se ressentent dans ses compositions massives et puissantes dans lesquelles il aime combiner des sonorités synthétiques sombres à des basses lourdes et kick drums percutants.<br>
                       En 2001, Kris se fait connaître sur la scène hardtechno française et européenne en tant que DJ, producteur et compositeur sous le pseudonyme « Dark Fork ». Ses titres aux styles musicaux différents (de la trap à la trance psychédélique) sont toujours produits sous divers pseudos et labels.<br>
                       En 2013, il crée un studio de production musicale. Son travail de musicien et ingénieur du son le conduit à écouter les maquettes de son fidèle ami David M. Thurisaz. Touché par ses textes et sa musique aux mélodies entêtantes, il décide de s’associer avec lui. En 2016, réunis par leur passion commune pour la musique rock , ils créent le groupe YVARD. Actuellement Kris Yera contribue à l’évolution du groupe et travaille sur des projets personnels plus électroniques.'
                  ],
        ];

        foreach($users as $key => $member){

            $user = new User();
            $user->setEmail($member['email']);
            $user->setRoles($member['roles']);
            $user->setPrimarySkills($member['primarySkill']);
            $user->setOtherSkills($member['otherSkills']);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $member['password']));
            $user->setLastname($member['lastname']);
            $user->setFirstname($member['firstname']);
            $user->setType('member');
            $user->setDescription($member['description']);

            $manager->persist($user);
            $this->addReference('user_' . $key, $user);
        }

        $manager->flush();
    }
}
