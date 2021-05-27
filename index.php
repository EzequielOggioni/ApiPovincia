<?php   

// comentamos una linea

/*
    comentamos multiples lineas
*/

# comentar una linea

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}


include "Helper/funciones.php";
include "Helper/Singleton.php";

require "Entidades/IInterfaz.php";
require "Entidades/Localidad.php";
require "Entidades/Provincia.php";
/*
$bsas = new Provincia('Buenos Aires');
$stafe = new Provincia('Santa Fe');
var_dump($bsas);
mostrarValor($stafe->GetNombre());

$sing =  Singleton::getinstance();

mostrarValor($sing->mostrarAlgo());

return;
*/

if ( isset($_FILES['archivo'])){
    $destino =  'uploads/'.$_FILES['archivo']['name'];
    move_uploaded_file($_FILES['archivo']['tmp_name'],$destino);
    return;
    } 

if ( isset($_POST['usuario'])){

echo 'Ingreso correcto';
return;
}

if ( isset($_GET['imagen'])){
    $valorImagen = $_GET['imagen'];
    crearArchivo($valorImagen .'.txt');    
    switch ($valorImagen) {
        case '2':
            echo "/img/MiImagen.png";
            break;
        case '06':
            echo "/img/06.jpg";
            break;
        case '14':
            echo "/img/14.png";
            break;

        case '42':
            echo "/img/42.png";
            break;
        case '82':
            echo "/img/82.png";
            break;
                    
        default:
            echo "/img/404.jpg";
            break;
                    
        }

    //echo "/img/MiImagen.png";
    return;
}




/*
$miVariable = "carolina perez"; 

echo "mi variable es :" , $miVariable ;

$miVariable2 = 452;
print("<br> variable2 = $miVariable2 ");

$miVariable3 = false; 
printf(" variable 1 %s, variable2 : %d ",$miVariable,$miVariable2 );
print("<br>");


mostrarValor( strlen($miVariable));

mostrarVALOR( strtolower($miVariable));

mostrarVALOR( strtoupper($miVariable));

mostrarVALOR( substr($miVariable,0,8));

mostrarVALOR( strcmp($miVariable, "carolina perez"));

mostrarVALOR( ucfirst($miVariable));

mostrarVALOR( ucwords($miVariable));

$miArray =  array("Uno" => 10, "Dos" => 2,"Tres" => 3,"tres" => 5, "cinco" => 8 );

krsort($miArray);

echo "<br> aca toy";


echo (int)(true xor true);
echo "<br>";
echo (int)(false and true);
echo "<br>";


foreach($miArray as $k => $valor ){
    echo "<br>";echo $k," - " , $valor;
}
*/

if ( isset($_GET['provincia'])){
    $valor = $_GET['provincia'];
    
    switch($valor){
        case "02":
            echo '[{"numero":"02014","nombre":"Comuna 2"},{"numero":"02056","nombre":"Comuna 8"},{"numero":"02098","nombre":"Comuna 14"},{"numero":"02021","nombre":"Comuna 3"},{"numero":"02063","nombre":"Comuna 9"},{"numero":"02049","nombre":"Comuna 7"},{"numero":"02070","nombre":"Comuna 10"},{"numero":"02077","nombre":"Comuna 11"},{"numero":"02042","nombre":"Comuna 6"},{"numero":"02091","nombre":"Comuna 13"},{"numero":"02007","nombre":"Comuna 1"},{"numero":"02028","nombre":"Comuna 4"},{"numero":"02035","nombre":"Comuna 5"},{"numero":"02084","nombre":"Comuna 12"},{"numero":"02105","nombre":"Comuna 15"}]';
            break;
        case "06":
            echo '[{"numero":"06412","nombre":"José C. Paz"},{"numero":"06014","nombre":"Adolfo Gonzales Chaves"},{"numero":"06315","nombre":"General Juan Madariaga"},{"numero":"06791","nombre":"Tandil"},{"numero":"06196","nombre":"Coronel Pringles"},{"numero":"06805","nombre":"Tigre"},{"numero":"06819","nombre":"Tornquist"},{"numero":"06126","nombre":"Campana"},{"numero":"06511","nombre":"Maipú"},{"numero":"06007","nombre":"Adolfo Alsina"},{"numero":"06651","nombre":"Puán"},{"numero":"06875","nombre":"Villarino"},{"numero":"06392","nombre":"General Villegas"},{"numero":"06770","nombre":"San Pedro"},{"numero":"06224","nombre":"Chivilcoy"},{"numero":"06287","nombre":"General Alvear"},{"numero":"06168","nombre":"Castelli"},{"numero":"06028","nombre":"Almirante Brown"},{"numero":"06441","nombre":"La Plata"},{"numero":"06119","nombre":"Brandsen"},{"numero":"06854","nombre":"25 de Mayo"},{"numero":"06609","nombre":"Pehuajó"},{"numero":"06301","nombre":"General Belgrano"},{"numero":"06547","nombre":"Monte"},{"numero":"06693","nombre":"Roque Pérez"},{"numero":"06638","nombre":"Pilar"},{"numero":"06497","nombre":"Luján"},{"numero":"06049","nombre":"Azul"},{"numero":"06539","nombre":"Merlo"},{"numero":"06210","nombre":"Chacabuco"},{"numero":"06161","nombre":"Carmen de Areco"},{"numero":"06364","nombre":"General Rodríguez"},{"numero":"06266","nombre":"Exaltación de la Cruz"},{"numero":"06760","nombre":"San Miguel"},{"numero":"06728","nombre":"San Andrés de Giles"},{"numero":"06413","nombre":"Junín"},{"numero":"06525","nombre":"Marcos Paz"},{"numero":"06532","nombre":"Mercedes"},{"numero":"06408","nombre":"Hurlingham"},{"numero":"06568","nombre":"Morón"},{"numero":"06371","nombre":"Ciudad Libertador San Martín"},{"numero":"06410","nombre":"Ituzaingó"},{"numero":"06784","nombre":"Suipacha"},{"numero":"06840","nombre":"Tres de Febrero"},{"numero":"06021","nombre":"Alberti"},{"numero":"06434","nombre":"Lanús"},{"numero":"06329","nombre":"General Las Heras"},{"numero":"06490","nombre":"Lomas de Zamora"},{"numero":"06574","nombre":"Navarro"},{"numero":"06134","nombre":"Cañuelas"},{"numero":"06483","nombre":"Lobos"},{"numero":"06658","nombre":"Quilmes"},{"numero":"06630","nombre":"Pila"},{"numero":"06322","nombre":"General La Madrid"},{"numero":"06105","nombre":"Bolívar"},{"numero":"06063","nombre":"Balcarce"},{"numero":"06406","nombre":"Hipólito Yrigoyen"},{"numero":"06238","nombre":"Dolores"},{"numero":"06847","nombre":"Tres Lomas"},{"numero":"06042","nombre":"Ayacucho"},{"numero":"06351","nombre":"General Pinto"},{"numero":"06399","nombre":"Guaminí"},{"numero":"06035","nombre":"Avellaneda"},{"numero":"06175","nombre":"Colón"},{"numero":"06742","nombre":"San Cayetano"},{"numero":"06833","nombre":"Tres Arroyos"},{"numero":"06700","nombre":"Saavedra"},{"numero":"06553","nombre":"Monte Hermoso"},{"numero":"06476","nombre":"Lobería"},{"numero":"06098","nombre":"Berisso"},{"numero":"06812","nombre":"Tordillo"},{"numero":"06665","nombre":"Ramallo"},{"numero":"06763","nombre":"San Nicolás"},{"numero":"06308","nombre":"General Guido"},{"numero":"06203","nombre":"Coronel Suárez"},{"numero":"06189","nombre":"Coronel Dorrego"},{"numero":"06581","nombre":"Necochea"},{"numero":"06056","nombre":"Bahía Blanca"},{"numero":"06280","nombre":"General Alvarado"},{"numero":"06357","nombre":"General Pueyrredón"},{"numero":"06518","nombre":"Mar Chiquita"},{"numero":"06868","nombre":"Villa Gesell"},{"numero":"06644","nombre":"Pinamar"},{"numero":"06336","nombre":"General Lavalle"},{"numero":"06420","nombre":"La Costa"},{"numero":"06505","nombre":"Magdalena"},{"numero":"06861","nombre":"Vicente López"},{"numero":"06707","nombre":"Saladillo"},{"numero":"06455","nombre":"Las Flores"},{"numero":"06686","nombre":"Rojas"},{"numero":"06252","nombre":"Escobar"},{"numero":"06623","nombre":"Pergamino"},{"numero":"06672","nombre":"Rauch"},{"numero":"06721","nombre":"Salliqueló"},{"numero":"06091","nombre":"Berazategui"},{"numero":"06648","nombre":"Presidente Perón"},{"numero":"06182","nombre":"Coronel de Marina Leonardo Rosales"},{"numero":"06462","nombre":"Leandro N. Alem"},{"numero":"06294","nombre":"General Arenales"},{"numero":"06679","nombre":"Rivadavia"},{"numero":"06343","nombre":"General Paz"},{"numero":"06735","nombre":"San Antonio de Areco"},{"numero":"06560","nombre":"Moreno"},{"numero":"06427","nombre":"La Matanza"},{"numero":"06466","nombre":"Lezama"},{"numero":"06655","nombre":"Punta Indio"},{"numero":"06616","nombre":"Pellegrini"},{"numero":"06154","nombre":"Carlos Tejedor"},{"numero":"06077","nombre":"Arrecifes"},{"numero":"06140","nombre":"Capitán Sarmiento"},{"numero":"06714","nombre":"Salto"},{"numero":"06588","nombre":"9 de Julio"},{"numero":"06826","nombre":"Trenque Lauquen"},{"numero":"06147","nombre":"Carlos Casares"},{"numero":"06595","nombre":"Olavarría"},{"numero":"06260","nombre":"Esteban Echeverría"},{"numero":"06385","nombre":"General Viamonte"},{"numero":"06515","nombre":"Malvinas Argentinas"},{"numero":"06469","nombre":"Lincoln"},{"numero":"06798","nombre":"Tapalqué"},{"numero":"06112","nombre":"Bragado"},{"numero":"06270","nombre":"José M. Ezeiza"},{"numero":"06274","nombre":"Florencio Varela"},{"numero":"06778","nombre":"San Vicente"},{"numero":"06231","nombre":"Daireaux"},{"numero":"06245","nombre":"Ensenada"},{"numero":"06448","nombre":"Laprida"},{"numero":"06756","nombre":"San Isidro"},{"numero":"06084","nombre":"Benito Juárez"},{"numero":"06749","nombre":"San Fernando"},{"numero":"06882","nombre":"Zárate"},{"numero":"06602","nombre":"Patagones"},{"numero":"06217","nombre":"Chascomús"},{"numero":"06070","nombre":"Baradero"},{"numero":"06277","nombre":"Florentino Ameghino"}]';
            break;
        case "10":
            echo '[{"numero":"10098","nombre":"Santa Rosa"},{"numero":"10070","nombre":"La Paz"},{"numero":"10035","nombre":"Belén"},{"numero":"10049","nombre":"Capital"},{"numero":"10014","nombre":"Ancasti"},{"numero":"10028","nombre":"Antofagasta de la Sierra"},{"numero":"10042","nombre":"Capayán"},{"numero":"10021","nombre":"Andalgalá"},{"numero":"10007","nombre":"Ambato"},{"numero":"10063","nombre":"Fray Mamerto Esquiú"},{"numero":"10077","nombre":"Paclín"},{"numero":"10056","nombre":"El Alto"},{"numero":"10091","nombre":"Santa María"},{"numero":"10084","nombre":"Pomán"},{"numero":"10112","nombre":"Valle Viejo"},{"numero":"10105","nombre":"Tinogasta"}]';
            break;
        case "14":
            echo '[{"numero":"14147","nombre":"Santa María"},{"numero":"14126","nombre":"San Alberto"},{"numero":"14119","nombre":"Río Segundo"},{"numero":"14140","nombre":"San Justo"},{"numero":"14182","nombre":"Unión"},{"numero":"14161","nombre":"Tercero Arriba"},{"numero":"14098","nombre":"Río Cuarto"},{"numero":"14084","nombre":"Presidente Roque Sáenz Peña"},{"numero":"14035","nombre":"General Roca"},{"numero":"14112","nombre":"Río Seco"},{"numero":"14154","nombre":"Sobremonte"},{"numero":"14014","nombre":"Capital"},{"numero":"14056","nombre":"Juárez Celman"},{"numero":"14049","nombre":"Ischilín"},{"numero":"14168","nombre":"Totoral"},{"numero":"14042","nombre":"General San Martín"},{"numero":"14133","nombre":"San Javier"},{"numero":"14077","nombre":"Pocho"},{"numero":"14175","nombre":"Tulumba"},{"numero":"14028","nombre":"Cruz del Eje"},{"numero":"14091","nombre":"Punilla"},{"numero":"14070","nombre":"Minas"},{"numero":"14021","nombre":"Colón"},{"numero":"14105","nombre":"Río Primero"},{"numero":"14063","nombre":"Marcos Juárez"},{"numero":"14007","nombre":"Calamuchita"}]';
            break;
        case "18":
            echo '[{"numero":"18049","nombre":"Esquina"},{"numero":"18175","nombre":"Sauce"},{"numero":"18035","nombre":"Curuzu Cuatia"},{"numero":"18147","nombre":"San Martín"},{"numero":"18105","nombre":"Mercedes"},{"numero":"18119","nombre":"Paso de los Libres"},{"numero":"18056","nombre":"General Alvear"},{"numero":"18021","nombre":"Capital"},{"numero":"18168","nombre":"Santo Tomé"},{"numero":"18126","nombre":"Saladas"},{"numero":"18063","nombre":"General Paz"},{"numero":"18007","nombre":"Bella Vista"},{"numero":"18154","nombre":"San Miguel"},{"numero":"18070","nombre":"Goya"},{"numero":"18091","nombre":"Lavalle"},{"numero":"18161","nombre":"San Roque"},{"numero":"18112","nombre":"Monte Caseros"},{"numero":"18098","nombre":"Mburucuyá"},{"numero":"18042","nombre":"Empedrado"},{"numero":"18084","nombre":"Ituzaingó"},{"numero":"18133","nombre":"San Cosme"},{"numero":"18077","nombre":"Itatí"},{"numero":"18140","nombre":"San Luis del Palmar"},{"numero":"18014","nombre":"Berón de Astrada"},{"numero":"18028","nombre":"Concepción"}]';    
            break;    
        case "22":
            echo '[{"numero":"22112","nombre":"OHiggins"},{"numero":"22154","nombre":"Sargento Cabral"},{"numero":"22070","nombre":"Independencia"},{"numero":"22098","nombre":"Mayor Luis J. Fontana"},{"numero":"22043","nombre":"Fray Justo Santa María de Oro"},{"numero":"22126","nombre":"1° de Mayo"},{"numero":"22036","nombre":"12 de Octubre"},{"numero":"22063","nombre":"General Güemes"},{"numero":"22140","nombre":"San Fernando"},{"numero":"22147","nombre":"San Lorenzo"},{"numero":"22039","nombre":"2 de Abril"},{"numero":"22161","nombre":"Tapenagá"},{"numero":"22028","nombre":"Chacabuco"},{"numero":"22168","nombre":"25 de Mayo"},{"numero":"22133","nombre":"Quitilipi"},{"numero":"22119","nombre":"Presidencia de la Plaza"},{"numero":"22077","nombre":"Libertad"},{"numero":"22021","nombre":"Comandante Fernández"},{"numero":"22049","nombre":"General Belgrano"},{"numero":"22056","nombre":"General Donovan"},{"numero":"22105","nombre":"9 de Julio"},{"numero":"22007","nombre":"Almirante Brown"},{"numero":"22091","nombre":"Maipú"},{"numero":"22084","nombre":"Libertador General San Martín"},{"numero":"22014","nombre":"Bermejo"}]';
            break;
        case "26":
            echo '[{"numero":"26077","nombre":"Rawson"},{"numero":"26014","nombre":"Cushamen"},{"numero":"26063","nombre":"Mártires"},{"numero":"26056","nombre":"Languiñeo"},{"numero":"26035","nombre":"Futaleufú"},{"numero":"26098","nombre":"Tehuelches"},{"numero":"26021","nombre":"Escalante"},{"numero":"26091","nombre":"Sarmiento"},{"numero":"26105","nombre":"Telsen"},{"numero":"26042","nombre":"Gaiman"},{"numero":"26070","nombre":"Paso de Indios"},{"numero":"26084","nombre":"Río Senguer"},{"numero":"26049","nombre":"Gastre"},{"numero":"26007","nombre":"Biedma"},{"numero":"26028","nombre":"Florentino Ameghino"}]';
            break;
        case "30":
            echo '[{"numero":"30113","nombre":"Villaguay"},{"numero":"30088","nombre":"San Salvador"},{"numero":"30077","nombre":"Nogoyá"},{"numero":"30091","nombre":"Tala"},{"numero":"30070","nombre":"La Paz"},{"numero":"30015","nombre":"Concordia"},{"numero":"30035","nombre":"Federal"},{"numero":"30056","nombre":"Gualeguaychú"},{"numero":"30063","nombre":"Islas del Ibicuy"},{"numero":"30105","nombre":"Victoria"},{"numero":"30021","nombre":"Diamante"},{"numero":"30098","nombre":"Uruguay"},{"numero":"30084","nombre":"Paraná"},{"numero":"30008","nombre":"Colón"},{"numero":"30049","nombre":"Gualeguay"},{"numero":"30028","nombre":"Federación"},{"numero":"30042","nombre":"Feliciano"}]';
            break;
        case "34":
            echo '[{"numero":"34042","nombre":"Pilagás"},{"numero":"34021","nombre":"Laishí"},{"numero":"34056","nombre":"Pirané"},{"numero":"34063","nombre":"Ramón Lista"},{"numero":"34014","nombre":"Formosa"},{"numero":"34049","nombre":"Pilcomayo"},{"numero":"34035","nombre":"Patiño"},{"numero":"34007","nombre":"Bermejo"},{"numero":"34028","nombre":"Matacos"}]';
            break;
        case "42":
            echo '[{"numero":"42147","nombre":"Trenel"},{"numero":"42119","nombre":"Quemú Quemú"},{"numero":"42021","nombre":"Capital"},{"numero":"42028","nombre":"Catriló"},{"numero":"42007","nombre":"Atreucó"},{"numero":"42070","nombre":"Guatraché"},{"numero":"42154","nombre":"Utracán"},{"numero":"42098","nombre":"Loventué"},{"numero":"42077","nombre":"Hucal"},{"numero":"42049","nombre":"Chalileo"},{"numero":"42063","nombre":"Chical Co"},{"numero":"42084","nombre":"Lihuel Calel"},{"numero":"42126","nombre":"Rancul"},{"numero":"42035","nombre":"Conhelo"},{"numero":"42133","nombre":"Realicó"},{"numero":"42140","nombre":"Toay"},{"numero":"42042","nombre":"Curacó"},{"numero":"42091","nombre":"Limay Mahuida"},{"numero":"42112","nombre":"Puelén"},{"numero":"42014","nombre":"Caleu Caleu"},{"numero":"42056","nombre":"Chapaleufú"},{"numero":"42105","nombre":"Maracó"}]';
            break;
        case "46":
            echo '[{"numero":"46035","nombre":"Chamical"},{"numero":"46007","nombre":"Arauco"},{"numero":"46014","nombre":"Capital"},{"numero":"46028","nombre":"Coronel Felipe Varela"},{"numero":"46105","nombre":"Independencia"},{"numero":"46021","nombre":"Castro Barros"},{"numero":"46126","nombre":"Sanagasta"},{"numero":"46042","nombre":"Chilecito"},{"numero":"46056","nombre":"General Ángel V. Peñaloza"},{"numero":"46070","nombre":"General Juan F. Quiroga"},{"numero":"46112","nombre":"Rosario Vera Peñaloza"},{"numero":"46084","nombre":"General Ocampo"},{"numero":"46091","nombre":"General San Martín"},{"numero":"46049","nombre":"Famatina"},{"numero":"46119","nombre":"San Blas de Los Sauces"},{"numero":"46077","nombre":"General Lamadrid"},{"numero":"46063","nombre":"General Belgrano"},{"numero":"46098","nombre":"Vinchina"}]';
            break;
        case "50":
            echo '[{"numero":"50042","nombre":"La Paz"},{"numero":"50112","nombre":"Santa Rosa"},{"numero":"50084","nombre":"Rivadavia"},{"numero":"50126","nombre":"Tupungato"},{"numero":"50014","nombre":"General Alvear"},{"numero":"50091","nombre":"San Carlos"},{"numero":"50049","nombre":"Las Heras"},{"numero":"50056","nombre":"Lavalle"},{"numero":"50028","nombre":"Guaymallén"},{"numero":"50070","nombre":"Maipú"},{"numero":"50007","nombre":"Capital"},{"numero":"50021","nombre":"Godoy Cruz"},{"numero":"50035","nombre":"Junín"},{"numero":"50105","nombre":"San Rafael"},{"numero":"50077","nombre":"Malargüe"},{"numero":"50119","nombre":"Tunuyán"},{"numero":"50063","nombre":"Luján de Cuyo"},{"numero":"50098","nombre":"San Martín"}]';
            break;
                                    
        case "54":
            echo '[{"numero":"54028","nombre":"Capital"},{"numero":"54063","nombre":"Iguazú"},{"numero":"54091","nombre":"Oberá"},{"numero":"54098","nombre":"San Ignacio"},{"numero":"54035","nombre":"Concepción"},{"numero":"54119","nombre":"25 de Mayo"},{"numero":"54105","nombre":"San Javier"},{"numero":"54007","nombre":"Apóstoles"},{"numero":"54042","nombre":"Eldorado"},{"numero":"54112","nombre":"San Pedro"},{"numero":"54084","nombre":"Montecarlo"},{"numero":"54021","nombre":"Candelaria"},{"numero":"54014","nombre":"Cainguás"},{"numero":"54077","nombre":"Libertador General San Martín"},{"numero":"54049","nombre":"General Manuel Belgrano"},{"numero":"54056","nombre":"Guaraní"},{"numero":"54070","nombre":"Leandro N. Alem"}]';
            break;
        case "58":
            echo '[{"numero":"58070","nombre":"Los Lagos"},{"numero":"58035","nombre":"Confluencia"},{"numero":"58105","nombre":"Picunches"},{"numero":"58014","nombre":"Añelo"},{"numero":"58063","nombre":"Loncopué"},{"numero":"58084","nombre":"Ñorquín"},{"numero":"58091","nombre":"Pehuenches"},{"numero":"58077","nombre":"Minas"},{"numero":"58042","nombre":"Chos Malal"},{"numero":"58098","nombre":"Picún Leufú"},{"numero":"58007","nombre":"Aluminé"},{"numero":"58056","nombre":"Lácar"},{"numero":"58049","nombre":"Huiliches"},{"numero":"58021","nombre":"Catán Lil"},{"numero":"58028","nombre":"Collón Curá"},{"numero":"58112","nombre":"Zapala"}]';    
            break;
        case "62":
            echo '[{"numero":"62028","nombre":"Conesa"},{"numero":"62056","nombre":"Ñorquinco"},{"numero":"62014","nombre":"Avellaneda"},{"numero":"62042","nombre":"General Roca"},{"numero":"62035","nombre":"El Cuy"},{"numero":"62063","nombre":"Pichi Mahuida"},{"numero":"62007","nombre":"Adolfo Alsina"},{"numero":"62049","nombre":"9 de julio"},{"numero":"62091","nombre":"25 de Mayo"},{"numero":"62070","nombre":"Pilcaniyeu"},{"numero":"62084","nombre":"Valcheta"},{"numero":"62077","nombre":"San Antonio"},{"numero":"62021","nombre":"Bariloche"}]';
            break;
        case "66":
            echo '[{"numero":"66035","nombre":"Cerrillos"},{"numero":"66133","nombre":"Rivadavia"},{"numero":"66147","nombre":"Rosario de Lerma"},{"numero":"66084","nombre":"La Candelaria"},{"numero":"66063","nombre":"Guachipas"},{"numero":"66021","nombre":"Cafayate"},{"numero":"66028","nombre":"Capital"},{"numero":"66014","nombre":"Cachi"},{"numero":"66042","nombre":"Chicoana"},{"numero":"66098","nombre":"La Viña"},{"numero":"66112","nombre":"Metán"},{"numero":"66119","nombre":"Molinos"},{"numero":"66049","nombre":"General Güemes"},{"numero":"66154","nombre":"San Carlos"},{"numero":"66077","nombre":"La Caldera"},{"numero":"66007","nombre":"Anta"},{"numero":"66140","nombre":"Rosario de la Frontera"},{"numero":"66161","nombre":"Santa Victoria"},{"numero":"66056","nombre":"General José de San Martín"},{"numero":"66070","nombre":"Iruya"},{"numero":"66105","nombre":"Los Andes"},{"numero":"66126","nombre":"Orán"},{"numero":"66091","nombre":"La Poma"}]';
            break;
                                
        case "70":
            echo '[{"numero":"70021","nombre":"Calingasta"},{"numero":"70126","nombre":"25 de Mayo"},{"numero":"70049","nombre":"Iglesia"},{"numero":"70119","nombre":"Valle Fértil"},{"numero":"70112","nombre":"Ullum"},{"numero":"70007","nombre":"Albardón"},{"numero":"70133","nombre":"Zonda"},{"numero":"70014","nombre":"Angaco"},{"numero":"70035","nombre":"Caucete"},{"numero":"70063","nombre":"9 de Julio"},{"numero":"70077","nombre":"Rawson"},{"numero":"70056","nombre":"Jáchal"},{"numero":"70042","nombre":"Chimbas"},{"numero":"70091","nombre":"San Martín"},{"numero":"70084","nombre":"Rivadavia"},{"numero":"70098","nombre":"Santa Lucía"},{"numero":"70070","nombre":"Pocito"},{"numero":"70105","nombre":"Sarmiento"},{"numero":"70028","nombre":"Capital"}]';
            break;
        case "74":
            echo '[{"numero":"74007","nombre":"Ayacucho"},{"numero":"74014","nombre":"Belgrano"},{"numero":"74042","nombre":"Gobernador Dupuy"},{"numero":"74049","nombre":"Junín"},{"numero":"74028","nombre":"Chacabuco"},{"numero":"74056","nombre":"Juan Martín de Pueyrredón"},{"numero":"74035","nombre":"General Pedernera"},{"numero":"74063","nombre":"Libertador General San Martín"},{"numero":"74021","nombre":"Coronel Pringles"}]';
            break;
        case "78":
            echo '[{"numero":"78042","nombre":"Magallanes"},{"numero":"78007","nombre":"Corpen Aike"},{"numero":"78035","nombre":"Lago Buenos Aires"},{"numero":"78014","nombre":"Deseado"},{"numero":"78049","nombre":"Río Chico"},{"numero":"78028","nombre":"Lago Argentino"},{"numero":"78021","nombre":"Güer Aike"}]';
            break;
        case "82":
            echo '[{"numero":"82028","nombre":"Villa Constitución"},{"numero":"82063","nombre":"La Capital"},{"numero":"82133","nombre":"Vera"},{"numero":"82077","nombre":"9 de Julio"},{"numero":"82035","nombre":"Garay"},{"numero":"82070","nombre":"Las Colonias"},{"numero":"82014","nombre":"Caseros"},{"numero":"82084","nombre":"Rosario"},{"numero":"82119","nombre":"San Lorenzo"},{"numero":"82056","nombre":"Iriondo"},{"numero":"82007","nombre":"Belgrano"},{"numero":"82105","nombre":"San Jerónimo"},{"numero":"82126","nombre":"San Martín"},{"numero":"82021","nombre":"Castellanos"},{"numero":"82112","nombre":"San Justo"},{"numero":"82091","nombre":"San Cristóbal"},{"numero":"82098","nombre":"San Javier"},{"numero":"82049","nombre":"General Obligado"},{"numero":"82042","nombre":"General López"}]';
            break;
        case "86":
            echo '[{"numero":"86014","nombre":"Alberdi"},{"numero":"86154","nombre":"Rivadavia"},{"numero":"86098","nombre":"Juan F. Ibarra"},{"numero":"86077","nombre":"General Taboada"},{"numero":"86063","nombre":"Choya"},{"numero":"86147","nombre":"Río Hondo"},{"numero":"86035","nombre":"Banda"},{"numero":"86182","nombre":"Sarmiento"},{"numero":"86042","nombre":"Belgrano"},{"numero":"86007","nombre":"Aguirre"},{"numero":"86084","nombre":"Guasayán"},{"numero":"86049","nombre":"Capital"},{"numero":"86105","nombre":"Loreto"},{"numero":"86070","nombre":"Figueroa"},{"numero":"86119","nombre":"Moreno"},{"numero":"86021","nombre":"Atamisqui"},{"numero":"86126","nombre":"Ojo de Agua"},{"numero":"86056","nombre":"Copo"},{"numero":"86161","nombre":"Robles"},{"numero":"86189","nombre":"Silípica"},{"numero":"86168","nombre":"Salavina"},{"numero":"86133","nombre":"Pellegrini"},{"numero":"86028","nombre":"Avellaneda"},{"numero":"86112","nombre":"Mitre"},{"numero":"86140","nombre":"Quebrachos"},{"numero":"86175","nombre":"San Martín"},{"numero":"86091","nombre":"Jiménez"}]';
            break;
        case "90":
            echo '[{"numero":"90063","nombre":"Lules"},{"numero":"90119","nombre":"Yerba Buena"},{"numero":"90105","nombre":"Tafí Viejo"},{"numero":"90007","nombre":"Burruyacú"},{"numero":"90035","nombre":"Graneros"},{"numero":"90021","nombre":"Chicligasta"},{"numero":"90070","nombre":"Monteros"},{"numero":"90056","nombre":"Leales"},{"numero":"90028","nombre":"Famaillá"},{"numero":"90084","nombre":"Capital"},{"numero":"90014","nombre":"Cruz Alta"},{"numero":"90112","nombre":"Trancas"},{"numero":"90098","nombre":"Tafí del Valle"},{"numero":"90049","nombre":"La Cocha"},{"numero":"90042","nombre":"Juan Bautista Alberdi"},{"numero":"90077","nombre":"Río Chico"},{"numero":"90091","nombre":"Simoca"}]';
            break;
        case "94":
            echo '[{"numero":"94011","nombre":"Tolhuin"},{"numero":"94028","nombre":"Antártida Argentina"},{"numero":"94021","nombre":"Islas del Atlántico Sur"},{"numero":"94008","nombre":"Río Grande"},{"numero":"94015","nombre":"Ushuaia"}]';
            break;

        }
    
    }else{
        
        $listaPcias =  json_decode(leerArchivo('uploads/Provincias.json'));
        
        $arratProvincias = array();
        //recorro los objetos de la lista
        foreach ($listaPcias as  $objStandar) {
            //recorro los valores del objeto
            $tempPcia = new Provincia();
            foreach ($objStandar as $atr => $valueAtr) {
                $tempPcia->{$atr} = $valueAtr;
            }
            array_push($arratProvincias,$tempPcia);
            
        }
        
      echo json_encode($arratProvincias);
      

    }        
  
?>