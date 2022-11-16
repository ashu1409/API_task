# API_task

Firstly, make sure you have installed PHP 7.1 or a higher version and the Composer package manager to create a new Symfony application.
 After that, create a new project by executing the following command in the terminal

composer create-project symfony/skeleton rest_api_project

The config directory contains all bundles configuration files and a list of enabled bundles in the bundles.php file. Symfony 4 will automatically register all bundles after the installation using Symfony flex recipes.
The public folder provides access to the application via the index.php entry point whereas the src folder contains all controllers, custom services, and objects. The var directory contains system logs and cache files. The vendor folder contains all external packages. 

install some necessary bundles with composer 

composer require friendsofsymfony/rest-bundle
composer require sensio/framework-extra-bundle
composer require jms/serializer-bundle
composer require symfony/validator
composer require symfony/form
composer require symfony/orm-pack

Besides the friendsofsymfony/rest-bundle, we also installed the sensio/framework-extra-bundle. It will help us to make code easier to read by using annotations for defining our routes. 

We will use jms/serializer-bundle to serialize and deserialize resources of the application. We do have some validation requirements in our testing entity. Because of this, it’s also necessary to add a validator bundle. The form bundle will help us to handle incoming user data and convert it into a resource entity. We need to install symfony/orm-pack for the integration with Doctrine ORM to connect with a database. Database configuration may be set in the .env file.

After we have finished with the installation, let's create a test resource entity. Create a new file called Order.php inside the src/Entity folder

Run the bin/console doctrine:schema: create command in the application directory to create a database structure according to our order class with Doctrine ORM. We need to create a simple form for the Order entity inside the src/Form folder to handle and validate a user’s request to post a new order:

At the next step, set the following configuration for the fos_rest bundle

and add this code to the bottom of services the .yaml config file

Here we defined two routes, GET ‘/api/orders’ will return to us the list of all the orders. The POST ‘/api/order’ request will run data validation with a Symfony form and create a new order resource if data is valid. Ok, we have finished with the basic structure, let’s check how it works. First thing, try to create a couple of new resources by sending data in a JSON format.
