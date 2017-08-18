# Twitter login with slim 3 microframework

To login with twitter using slim generate CONSUMER_KEY and CONSUMER_SECRET_KEY from your app, have been created in twitter developer account

Replace `[my-app-KEY]` with your KEY:

* Copy KEY in `src/setttings.php` file on `tw` array


		'tw'=>[
            'consumer_key'=>'',
            'consumer_secret'=>''
        ]

To run the application in localhost:

	http://localhost/[Project-name]/login/twitter/


To view twitter login code follow:

	src/classes/twitter.php