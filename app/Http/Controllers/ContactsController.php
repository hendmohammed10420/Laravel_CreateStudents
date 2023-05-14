<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
public function index(){
    return '<h1>List of contacts page </h1>';
}
public function index2 () {
    return '<h1>New contact</h1>';
}
public function index3 ($id) {
    return '<h1>Details page of contact #'.$id.' </h1>';
}
public function index4($id) {
    return '<h1>This is edit form of contact #'.$id.' </h1>';
}
public function index5($id,$name=null) {
    return '<h1>Details page of contact #'.$id.' named '.$name.'</h1>';
}
public function index6($id) {
    return '<h1>Update contact #'.$id.' </h1>';
}
public function index7 ($id) {
    return '<h1>Delete contact #'.$id.' </h1>';
}
}
