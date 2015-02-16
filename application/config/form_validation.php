<?php
$config = array(
    "login" => array(
	array(
	    "field" => "username",
	    "label" => "Username",
	    "rules" => "required"
	),
	array(
	    "field" => "password",
	    "label" => "Password",
	    "rules" => "required|callback_authenticate"
	)
    )
);