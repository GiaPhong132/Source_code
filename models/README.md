<<<<<<< HEAD
<<<<<<< HEAD
Include model:
    .models/<model>.php

=======
>>>>>>> origin/HDA
=======
=======
Include model:
    .models/<model>.php

>>>>>>> TQH
>>>>>>> origin/HDA
How to call function:
    <classname>::<functionname>


admin.php
class Admin
{
    username
    password
}
- insert(username, password) => bool
- delete(username) => bool
- validation(username, password) => bool
- changePassword(username, oldpassword, newpassword) => bool
- getAll() => username[]


user.php
class User
{
    email
    profile_photo
    fname
    lname
    createAt
    password
}
<<<<<<< HEAD
<<<<<<< HEAD
- insert(email, profile_photo, fname, lname, gender, age, phone, password) => bool
- delete(email) => bool
- update(email, profile_photo, fname, lname, gender, age, phone) =>bool
=======
- insert(email, profile_photo, fname, lname, password) => bool
- delete(email) => bool
- update(email, profile_photo, fname, lname) =>bool
>>>>>>> origin/HDA
=======
- insert(email, profile_photo, fname, lname, password) => bool
- delete(email) => bool
- update(email, profile_photo, fname, lname) =>bool
=======
- insert(email, profile_photo, fname, lname, gender, age, phone, password) => bool
- delete(email) => bool
- update(email, profile_photo, fname, lname, gender, age, phone) =>bool
>>>>>>> TQH
>>>>>>> origin/HDA
- validation(email, password) => bool
- changePassword(email, oldpassword, newpassword) => bool
- getAll() => User[]        # Do not return password, password field is ''
- get(email) => User        # Do not return password, password field is ''


product.php
class Product
{
    id
    name
    price
<<<<<<< HEAD
<<<<<<< HEAD
    description
=======
>>>>>>> origin/HDA
=======
=======
    description
>>>>>>> TQH
>>>>>>> origin/HDA
    content
    price
    img
}
<<<<<<< HEAD
<<<<<<< HEAD
- insert(name, price, description, content, price, img) => bool
- delete(id) => bool
- update(id, name, price, description, content, price, img) => bool
=======
- insert(name, price, content, price, img) => bool
- delete(id) => bool
- update(id, name, price, content, price, img) => bool
>>>>>>> origin/HDA
=======
- insert(name, price, content, price, img) => bool
- delete(id) => bool
- update(id, name, price, content, price, img) => bool
=======
- insert(name, price, description, content, price, img) => bool
- delete(id) => bool
- update(id, name, price, description, content, price, img) => bool
>>>>>>> TQH
>>>>>>> origin/HDA
- getAll() => Product[]
- get(id) => Product


news.php
class News
{
    id
    status
    date
    title
<<<<<<< HEAD
<<<<<<< HEAD
=======
    content
}
- insert(title, content) => bool
- 
=======
>>>>>>> origin/HDA
    description
    content
}
- insert(title,description, content) => bool
- delete(id) => bool
- update(id, description, title, content) => bool
- getAll() => News[]
- get(id) => News
- hide(id) => bool
- show(id) => bool
<<<<<<< HEAD
=======
    content
}
- insert(title, content) => bool
- 
>>>>>>> origin/HDA
=======
>>>>>>> TQH
>>>>>>> origin/HDA


comment.php
class Comment
{
    id
    date
    approved
    content
    news_id
    user_id
}
- insert(id, approved, content, news_id, user_id) => bool
- delete(id) => bool
- update(id, content) => bool
- getCommentByNews(news_id) => Comment[]
- getCommentByUser(user_id) => Comment[]
- block(id) => bool
<<<<<<< HEAD
- unblock(id) => bool
=======
- unblock(id) => bool
<<<<<<< HEAD
>>>>>>> origin/HDA
=======
>>>>>>> TQH
>>>>>>> origin/HDA
