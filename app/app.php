<?php 
	require_once __DIR__."/../vendor/autoload.php";
	require_once __DIR__."/../src/Contact.php";
	
	session_start();
	if(empty($_SESSION[list_of_contacts])) {
		$_SESSION[list_of_contacts] = array();
	}
	
	$app = new Silex\Application();
	$app['debug'] = true;
	$app->register(new Silex\Provider\TwigServiceProvider(), array(
		'twig.path' => __DIR__.'/../views'
	));
	/*
	Renders the homepage and sends all intances of contacts to get malipulated by Twig
	*/
	$app->get("/", function() use ($app) {
		return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
	});
	
	/*
	Creates a new instance of contact initialized with the variables input by the user in the homepage
	Renders the contact_saved page and sends the new contact created to be diplayed on the new page
	*/
	$app->post("/save_contact", function() use ($app) {
		$new_contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
		$new_contact->save();
		return $app['twig']->render('contact_saved.html.twig', array('new_contact' => $new_contact));
	});
	
	/*
	Renders the delete_contacts page and deletes all instances of Contact
	*/
	$app->post("/delete_contacts", function() use($app) {
		Contact::deleteAll();
		return $app['twig']->render('contacts_deleted.html.twig');
	});
	return $app;
?>