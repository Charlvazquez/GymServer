<?php
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    ini_set('display_errors', '0');
    require('fpdf.php');
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
    $formato = "SELECT a.Id_Membresia, CONCAT(b.Nombre, ' ', b.Apellido) AS nombre_completo,c.Descripcion AS plan_pago,d.Nombre AS tipo_pago,a.FechaVencimiento FROM membresia AS a
    LEFT JOIN usuario AS b ON a.Id_Usuario = b.Id_Usuario
    LEFT JOIN plan_pago AS c ON a.Id_Plan = c.Id_Plan
    LEFT JOIN tipo_pago AS d ON a.id_TipoPago = d.Id_TipoDePago
    WHERE a.Id_Usuario =  '$cliente' ";
    $resultado = $con->query($formato); 
    if (!$resultado) {
        echo "Error al ejecutar la consulta: " . $con->error;
        exit();
    }
} else {
    echo "No se recibió el parámetro id.";
    exit();
} 
           

class PDF extends FPDF {
}
// Salida del PDF
$pdf = new PDF("P", "mm", "letter");
$pdf->AddPage();

// Sección de Reporte
$pdf->SetFont("Arial", "B", 7);
$pdf->SetFillColor(242, 233, 230);
$pdf->Cell(20, 5, "ID", 1, 0, "C",true);
$pdf->Cell(40, 5, "NOMBRE COMPLETO", 1, 0, "C",true);
$pdf->Cell(25, 5, "PLAN DE PAGO", 1, 0, "C",true); // El parámetro true indica que se debe aplicar el color de fondo
$pdf->Cell(25, 5, "TIPO DE PAGO", 1, 0, "C",true);
$pdf->Cell(40, 5, "FECHA DE VENCIMIENTO", 1, 1, "C",true);
$pdf->SetFont("Arial", "", 8);
// Obtener la primera fila para mostrar las cabeceras de la tabla
$fila = $resultado->fetch_assoc();
$pdf->Cell(20, 5, $fila["Id_Membresia"], 1, 0, "C");
$pdf->Cell(40, 5, $fila["nombre_completo"], 1, 0, "C");
$pdf->Cell(25, 5, $fila["plan_pago"], 1, 0, "C", true);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(25, 5, $fila["tipo_pago"], 1, 0, "C");
$pdf->Cell(40, 5, $fila["FechaVencimiento"], 1, 1, "C");
// Imprimir el resto de los registros
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(20, 5, $fila["Id_Membresia"], 1, 0, "C");
    $pdf->Cell(40, 5, $fila["nombre_completo"], 1, 0, "C");
    $pdf->Cell(25, 5, $fila["plan_pago"], 1, 0, "C", true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(25, 5, $fila["tipo_pago"], 1, 0, "C");
    $pdf->Cell(40, 5, $fila["FechaVencimiento"], 1, 1, "C");
}
$pdf->Output();
?>
