<?php

namespace App;

class Api extends MainController
{
    //GET /users - получить список всех юзеров //getUsers
//POST /users - создать юзера //storeUser //createUser //sozdatUser
//GET /users/1 - получить юзера №1 //getUserById
//PUT/PATCH /users/1 - обновить юзера №1 //updateUserById
//DELETE /users/1 - удалить юзера №1 //deleteUserByid
//DELETE /users - массовое удаление юзеров //deleteUsers
//if (empty($_COOKIE['authorized'])) {
//    http_response_code(401);
//    echo "auth first";
//}

    public function books()
    {
        $requestmethod = empty($_POST['_method']) ? strtoupper($_SERVER['REQUEST_METHOD']) : $_POST['_method'];
        switch ($requestmethod) {
            case 'GET':
            default:
                $this->responseGet();
                break;
            case 'POST':
                $this->responsePost();
                break;
            case 'DELETE':
                $this->responseDelete();
                break;
            case "PUT":
            case "PATCH":
                $this->responseUpdate();
        }
    }

    public function routes()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        return $routes[3];
    }

    public function responseUpdate()
    {
        if (!empty($_REQUEST['id'])) {
            $book = Book::find($_REQUEST['id']);
            if (empty($book)) {
                http_response_code(404);
                echo "Failed to update: 404 not found";
            } else {
                if (!empty($_REQUEST['name'])) {
                    $book->name = strip_tags($_REQUEST['name']);
                    $book->save();
                    echo "user updated";
                } else {
                    http_response_code(422);
                    echo "Field 'name' required";
                }
            }
        } else {
            http_response_code(422);
            echo "Field 'id' required";
        }
    }

    public function responseDelete()
    {
        $_REQUEST['id'] = $this->routes();
        if (!empty($_REQUEST['id'])) {
            $book = Book::find($_REQUEST['id']);
            if (empty($book)) {
                http_response_code(404);
                echo "Failed to delete: 404 not found";
            } else {
                $book->delete();
                echo "User deleted";
            }
        } else {
            http_response_code(422);
            echo "Field 'id' required";
        }
    }

    public function responsePost()
    {
        if (empty($_POST['name']) && empty($_POST['description']) && empty($_POST['category_id'])) {
            http_response_code(422);
            echo "Field 'name' required";
        } else {
            $book = new Book();
            $book->name = $_POST['name'];
            $book->description = $_POST['description'];
            $book->category_id = $_POST['category_id'];
            $book->save();
            echo $book;
        }
    }

    public function responseGet()
    {

//        if (!empty($this->routes())) {
//            $book = Book::find($this->routes());
//            if (empty($book)) {
//                http_response_code(404);
//                echo "404 not found";
//            } else {
//                echo $book;
//                //print_r(json_encode($book, JSON_UNESCAPED_UNICODE));
//            }
//        } else {
//            // print_r(json_encode(Book::all(), JSON_UNESCAPED_UNICODE));
//            echo Book::all();
//        }
        $_GET['id'] = $this->routes();
        if (!empty($_GET['id'])) {
            $user = Book::find($_GET['id']);
            if (empty($user)) {
                http_response_code(404);
                echo "404 not found";
            } else {
                echo json_encode($user);
            }
        } else {
            echo json_encode(Book::all());
        }
    }

}
