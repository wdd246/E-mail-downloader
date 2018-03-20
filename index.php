<?php
error_reporting(E_ALL ^ E_NOTICE);

@$f=1; // kolejne liczby/nazwy plików .txt

for($w=0; $w<=2; $w++){ //ilość stron w tablicy niżej -1
    echo "<br><br>Link nr. ";
	echo "$w";
	echo "<br>";
    
@$podstr = Array( // dodajemy ilośc podstron według kolejności stron
    3,4,6
);
for($z=1; $z<=$podstr[$w]; $z++){// kolejne podstrony 
@$web = Array( // dodajemy strony 
    
    "https://panoramafirm.pl/okna/firmy,$z.html",
    "https://panoramafirm.pl/sprzeda%C5%BC_i_rezerwacja_bilet%C3%B3w/firmy,$z.html",
    "https://panoramafirm.pl/hydraulika_siłowa/firmy,$z.html",
);
    
//error_reporting(E_ALL ^ E_NOTICE);
	echo "<br>Podstrona nr. ";
	echo "$z";
	echo "<br>";
$context = stream_context_create(['http' => ['max_redirects' => 9999]]);
$string = file_get_contents($web[$w]);


//$string = file_get_contents($url);
//$string = file_get_contents('index.html');

$matches = array();
$pattern = '/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i';

preg_match_all($pattern,$string,$matches);
for($i=0; $i<1; $i++){
    for($j=0; $j<=45; $j++){


    	if($matches[$i][$j] == $matches[$i][$j-1]){
            continue;
        }
        else{
            echo $matches[$i][$j]."; \n";
       }
        $file = file_get_contents('file'.$f.'.txt'); //nazwa pliku .txt
        $output = $matches[$i][$j].";";
        file_put_contents('file'.$f.'.txt', $output . $file);
        
    }
}
    flush();
    sleep(29);
}
    $f++; 
    flush();
	sleep(29);
}
echo "ok";
?>
