<?php
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    ini_set('display_errors', '0');
    require('../fpdf.php');
    $con = mysqli_connect("localhost", "root", "", "gym");
    if (mysqli_connect_errno()) {
       echo "Error al conectar a la base de datos, por favor intente en unos momentos: " . mysqli_connect_error();
       exit();
    }
}    


if(isset($_GET['id'])) {
    $cliente = $_GET['id'];
    setlocale(LC_TIME, 'es_ES.UTF-8');
    $fechareporte_mes_actual = utf8_encode(strftime("%B"));
    $fechareporte = utf8_encode(strftime("%d / %B / %Y"));
    $formato = "SELECT a.Fecha_Rutina, c.nombre,b.repeticiones,d.descripcion FROM rutina AS a 
    LEFT JOIN rutina_ejerccio AS b ON a.Id_Rutina = b.id_rutina
    LEFT JOIN ejercicio_list AS c ON b.id_ejercicio = c.Id_Ejercicio
    LEFT JOIN categoria_ejercicios AS d ON c.id_categoria = d.id_categoria
    WHERE a.Id_Usuario = '$cliente' ";

    $resultado = $con->query($formato);
    
    if (!$resultado) {
        echo "Error al ejecutar la consulta: " . $con->error;
        exit();
    }
     // Obtener la sucursal de la consulta
     $fila = $resultado->fetch_assoc();
     //$nombre_sucursal = $fila['sucursal'];
} else {
    echo "No se recibió el parámetro id.";
    exit();
} 
           

class PDF extends FPDF {
    // Cabecera de página
    /*function Header() {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Mi primer archivo PDF con FPDF',0,1,'C');
        $this->Ln(10);

        
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }*/
}



// Salida del PDF
$pdf = new PDF("P", "mm", "letter");
$pdf->AddPage();
//$pdf->SetFont("Arial", "B", 12);
//$pdf->Cell(190,5, "Prueba de formato", 0, 1, "C");


// Sección de Reporte
$pdf->SetFont("Arial", "B", 7);
$pdf->SetFillColor(242, 233, 230);
$pdf->Cell(45, 5, "FECHA", 1, 0, "C",true);
$pdf->Cell(17, 5, "EJERCICIO", 1, 0, "C",true);
$pdf->Cell(25, 5, "REPETICIONES", 1, 0, "C",true); // El parámetro true indica que se debe aplicar el color de fondo
$pdf->Cell(20, 5, "ZONA CORPORAL", 1, 0, "C",true);
//$pdf->Cell(45, 5, "ESTADO", 1, 1, "C",true);

$pdf->SetFont("Arial", "", 8);

while($fila = $resultado->fetch_assoc()){
    $pdf->Cell(45, 5, $fila["Fecha_Rutina"], 1, 0, "C");
    $pdf->Cell(17, 5, $fila["nombre"], 1, 0, "C");
    $pdf->SetFillColor(173, 216, 230); // Color azul claro
    $pdf->Cell(25, 5, $fila["repeticiones"], 1, 0, "C", true); // El parámetro true indica que se debe aplicar el color de fondo
    $pdf->SetFillColor(255, 255, 255); // Restaurar el color de fondo a blanco

    $pdf->Cell(20, 5, $fila["descripcion"], 1, 0, "C");
    
}


$pdf->Output();
?>
