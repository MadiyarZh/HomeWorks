<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(Request $request) {
    	$name = $request -> input('name');
    	$surname = $request -> input('surname');
    	
    	?> 
    	<h2 style="text-align: center; margin: 50px;">
    		<?php
    		echo "Hello!!! Your name is ".$name."! "." "."Your surname is ".$surname. "!!!" ;
    		?>
    	</h2>
        <?php
    }
}

?>