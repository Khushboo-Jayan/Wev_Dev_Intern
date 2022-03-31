Library Booking
Pages used:
1) DATABASE.PHP
database. php allows the user to make a connection between our database and php files this helps us store and retrieve data from the database.

2) LOGIN. PHP
This page is allows to user to login to the website then the entered data is checked by the server if data follows matches the data in our database then the user is allowed to use the facilities provided by our library website.

3) SIGNUP.PHP
If the user does not already has a account then he is been provided a form to create a password this will insert a row in our users table in the database.

4)HOME.PHP
This is my home page it will display the same to the guest and the user however, if the guest tries to use any facilities by clicking on navbar item the website will redirect the user to login page. However, if the user is login the home page will change the login and signup buttons to logout button. Moreover, the users name will be displayed and welcomed like 'Hi tommy100' on the home.php page.

5) V IEW.PHP
This page will display all the books the current user has borrowed from library in a table type. Besides the table also provides a link for the return the books by clicking on unreserve. This page uses the user_name of the current user logged in as a criteria and creates an inner join between books and reservedbooks table in database and retrives the ISBN number for the books reserved. 




6) AUTHOR_SEARCH.PHP
The user can search for a particular book or any book that consists the array searched for (Partial search) and displays the data in table form. This table quickly goes through the books table in database where the AuthorName is like "%search%" 

7)BOOK_SEARCH.PHP
This works the same as author_search.php however instead of author_name it looks for book name that has the typed string in it.

8)CATEGORY_SEARCH.PHP
This provides a dropdown search option where the user can select a specific category and the website will return all the books that come under that cateory.

9) RESERVE_DATA.PHP
This page is used as an hyperlink on all the search pages where when the user clicks on reserve link it brings us to this page. Here, the ISBN number of the user is passed from the search pages to reserve_data.php. Here, using $_GET we get the ISBN and the as a SESSION variable user_name is also used in the sql squery which we later use update the reservedbooks table and books table

10) UNRESERVE.PHP
This works in a similar way to reserve.php however, instead of inserting in the reservedbooks table we delete from it.

Home.php before logging in:
![image](https://user-images.githubusercontent.com/79542266/161059905-1e9ba32a-1823-4459-b971-c331bfe88c8f.png)

LOGIN.php page before login
![image](https://user-images.githubusercontent.com/79542266/161059970-d91df5f5-f10d-4b42-85a2-8ced730dedf7.png)

Home. Php after logging in
![image](https://user-images.githubusercontent.com/79542266/161060007-f345e61c-bfd3-499e-a2d6-1f17b3ac1096.png)

View.php
![image](https://user-images.githubusercontent.com/79542266/161060042-e70a6dd6-8cf4-4576-bd79-6703a7350eb9.png)

Search by booktitle.php
Search using ‘h’
![image](https://user-images.githubusercontent.com/79542266/161060075-0575741f-7a40-4b98-b815-0918c052c8cf.png)

I booked the book called ‘Cooking for Children’ output:
![image](https://user-images.githubusercontent.com/79542266/161060130-6ab12fd6-f4ed-41ce-bb48-6f1500deeccb.png)

Rechecked the books in book column using author name’ana’
![image](https://user-images.githubusercontent.com/79542266/161060167-782d013c-ab1b-4236-a0d8-23a6926ec34b.png)

Returned the book using unreserve
![image](https://user-images.githubusercontent.com/79542266/161060232-74498cad-97f2-48a1-ab2a-b6b00f3de6e2.png)

output
![image](https://user-images.githubusercontent.com/79542266/161060270-60d11c4a-23a6-412a-bbc1-50296b2c7f75.png)

Searched using category.php 
![image](https://user-images.githubusercontent.com/79542266/161060310-bed2b753-9c29-43af-916b-2979b56b8d5b.png)
