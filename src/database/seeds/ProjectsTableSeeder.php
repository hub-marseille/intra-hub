<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('projects')->insert([
			'name' => 'An Art Odyssey',
			'desc' => '1.	L’EVENEMENTL’exposition Star Wars l An Art Odyssey est l’évènement de cette fin d’année 2015 dans la Cité Phocéenne. En partenariat avec LucasFilm, ACME Archives, le Poster Posse et la Ville de Marseille, le Café Pixel va proposer une cinquantaine d’illustrations totalement originales lors d’une exposition vente exceptionnelle. A cette occasion, Fitch signe, en partenariat avec l’école Epitech à Marseille, une application en réalité virtuelle totalement inédite !2.	LE PROJET Tim, Marvin et Fabien, 3 étudiants de l’école ont travaillé en étroite collaboration avec Fitch pour concevoir une application « interstellaire! » utilisant la technologie Card Board développé par GOOGLE. Passionnés par l’univers de la Saga Star Wars, ces étudiants ont été séduits par l’idée de développer sur une technologie immersive.3.	LE COTE INNOVANTLes étudiants d’Epitech sont reconnus pour leurs compétences techniques et leur capacité à s’adapter aux dernières évolutions technologiques. Pour l’exposition, Ils ont développé leur application à partir d’une technologie disponible depuis moins d’un an. Suite à la réalisation d’un prototype, les étudiants et les designers ont travaillé sur des données comportant le moins de polygones possibles afin d’optimiser les performances, rendant l’expérience aussi fluide que possible. Tenus à rendre l’application disponible pour le début de l’exposition, les étudiants ont pu développer un projet ambitieux avec un niveau d’exigence professionnel. T',
			'short_desc' => 'Application Immersive - Univers Star Wars.
Cette application en réalité virtuelle nous transporte pour un voyage vers de lointaines galaxies. En l’utilisant, les étoiles s’alignent pour créer des personnages inter-galactiques',
			'main_picture' => '/imgs/main_projects_imgs/d4984880d8f9f546837352e4f38dd9f8.png',
			'author_id' => 1,
			'status' => 'displayed',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);


		DB::table('projects')->insert([
			'name' => 'ELEPhant-Migration',
			'desc' => '1. EN REPONSE A UNE PROBLEMATIQUE
Aujourd’hui, les coûts logiciels et de maintenance liés aux bases de données sont de plus en plus élevés pour les entreprises notamment avec les solutions que proposent Oracle ou Microsoft.

2. L’OFFRE DU PROJET
Pour réduite ses coûts, Elephant-Migration propose aux entreprises qui disposent d’une base de données Oracle ou SQL Server de migrer vers une base PostgreSQL (qui est une solution gratuite).


3. LE COTE INNOVANT
Notre projet propose plus qu’une simple copie de données à nos utilisateurs . Il permet notamment de transférer les profils de configuration, les utilisateurs, les triggers, les procédures stockées ainsi que les scripts personnels tout en gardant la même arborescence présente sur la base initiale. 
4. ORGANISATION
Ce projet s’inscrit dans l’Epitech Innovative Project (EIP) qui a pour vocation de créer un produit commercialisable à la fin de deux années de développement (notamment de la 3e à la 5e année du cursus d’EPITECH).
Notre groupe est composé de six étudiants de 3e année appartenant au campus d’Epitech Marseille, d’Epitech Lyon et d’Epitech Nice.  ',
			'short_desc' => 'Migration de base de données',
			'main_picture' => '/imgs/main_projects_imgs/65a3186765816c3578354bd783e2e611.png',
			'author_id' => 1,
			'status' => 'displayed',
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);
	}
}
