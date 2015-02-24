<?php

function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

