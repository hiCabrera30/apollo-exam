<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Apollo Exam

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
<pre>
    1. Create a Laravel project
    2. Set DB_CONNECTION to sqlite
    3. Create a migration for 2 tables (Random [id, values(string), flag], Breakdown [id, values(string), random_id])
    4. Create a relationship: Random has many Breakdowns
    5. Create a loop (random number of iterations from 5-10) and inside that, we need to generate a random name
    for its value which we will save in Random (table) together with another loop (random number of
    iterations from 5-10) that will generate a random 5-character ( alphanumeric ) string for the Breakdowns
    (table)
    6. Use your eloquent relationships for creating and retrieving the data from your database.
    7. Retrieve only the entries from Random (table) that was not displayed yet and display all the
    corresponding breakdown in a spiral manner using only HTML, Javascript, CSS, PHP, or all of the
    above. Do this inside a vue template.
</pre>
   ![alt text](https://github.com/hiCabrera30/apollo-exam/blob/develop/spiral.png?raw=true)
<pre>
    8. Upload it to your github repo and send us the link so we can clone and check your work.
</pre>