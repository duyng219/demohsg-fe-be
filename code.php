<?php

require('Classes/PHPExcel.php');
    require ('./connect.php');
    
    if(isset($_POST['btnExport'])){

        $objExcel=new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet=$objExcel->getActiveSheet()->setTitle('HOASEN');
        $rowCount=1;
        $sheet->setCellValue('A'.$rowCount,'Tên vật tự');
        $sheet->setCellValue('B'.$rowCount,'Gía bán');
        $sheet->setCellValue('C'.$rowCount,'Số lượng');
        $sheet->setCellValue('D'.$rowCount,'Chi phí cụ thể');

        $sheet->getColumnDimension("A")->setAutoSize(true);
        $sheet->getColumnDimension("B")->setAutoSize(true);
        $sheet->getColumnDimension("C")->setAutoSize(true);
        $sheet->getColumnDimension("D")->setAutoSize(true);

        $sheet->getStyle('A1:D1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('ccff99');
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        
           
        $resultA = $conn->query("SELECT TenTon,TenSon,TenGachLatNen,TenLavabo FROM maunhachitiet ");
        while($row = mysqli_fetch_array($resultA)){
            $rowCount++;
            $sheet->setCellValue('A'.$rowCount++,$row['TenTon']);
            $sheet->setCellValue('A'.$rowCount++,$row['TenSon']);
            $sheet->setCellValue('A'.$rowCount++,$row['TenGachLatNen']);
            $sheet->setCellValue('A'.$rowCount++,$row['TenLavabo']);
         
    
        }
        $resultB = $conn->query("SELECT gia_ton,gia_son,gia_gachlatnen,gia_lavabo FROM maunhachitiet ");
        $rowCount=1;
        while($row = mysqli_fetch_array($resultB)){
            $rowCount++;
            $sheet->setCellValue('B'.$rowCount++,$row['gia_ton']);
            $sheet->setCellValue('B'.$rowCount++,$row['gia_son']);
            $sheet->setCellValue('B'.$rowCount++,$row['gia_gachlatnen']);
            $sheet->setCellValue('B'.$rowCount++,$row['gia_lavabo']);

    
        }
        $resultC = $conn->query("SELECT sl_ton,sl_son,sl_gachlatnen,sl_lavabo FROM maunhachitiet ");
        $rowCount=1;
        while($row = mysqli_fetch_array($resultC)){
            $rowCount++;
            $sheet->setCellValue('C'.$rowCount++,$row['sl_ton']);
            $sheet->setCellValue('C'.$rowCount++,$row['sl_son']);
            $sheet->setCellValue('C'.$rowCount++,$row['sl_gachlatnen']);
            $sheet->setCellValue('C'.$rowCount++,$row['sl_lavabo']);
          
    
        }
   
        for($i=2;$i<=$rowCount-1;$i++){
            $sheet->setCellValue('D'.$i,"=(B$i)*(C$i)");
        }
        $sheet->setCellValue('A'.$rowCount,'Tổng');
        $sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A'.$rowCount)->getFont()->setBold(true);
        $sumLast=$rowCount-1;
        $sheet->setCellValue('D'.$rowCount,"=SUM(D2:D$sumLast)");
        
       
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )  
    );
    $sheet->getStyle('A1:' . 'D'. ($rowCount))->applyFromArray($styleArray);

           $objWriter=new PHPExcel_Writer_Excel2007($objExcel);
           $filename='dutoanchiphi.xlsx';
           $objWriter->save($filename);
           ob_end_clean();
            header('Content-Disposition: attachment; filename="' . $filename .'"');
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($filename);
            return;
    
    }
    
    //mienbac
    $sBCap4 = "select * from maunha
    where TenMien='Miền bắc' and TenLoaiNha='Cấp 4' 
    ";
    $qBCap4 = mysqli_query($conn,$sBCap4);
    $rBCap4 = array();
    while($row = mysqli_fetch_assoc($qBCap4)){
        $rBCap4[] = $row;
    }

    $sBnhapho = "select * from maunha
    where TenMien='Miền bắc' and TenLoaiNha='Nhà phố' 
    ";
    $qBnhapho = mysqli_query($conn,$sBnhapho);
    $rBnhapho = array();
    while($row = mysqli_fetch_assoc($qBnhapho)){
        $rBnhapho[] = $row;
    }

    $sBBT = "select * from maunha
    where TenMien='Miền bắc' and TenLoaiNha='Biệt thự' 
    ";
    $qBBT = mysqli_query($conn,$sBBT);
    $rBBT= array();
    while($row = mysqli_fetch_assoc($qBBT)){
        $rBBT[] = $row;
    }
    //miennam
    $sNCap4 = "select * from maunha
    where TenMien='Miền nam' and TenLoaiNha='Cấp 4' 
    ";
    $qNCap4 = mysqli_query($conn,$sNCap4);
    $rNCap4 = array();
    while($row = mysqli_fetch_assoc($qNCap4)){
        $rNCap4[] = $row;
    }

    $sNnhapho = "select * from maunha
    where TenMien='Miền nam' and TenLoaiNha='Nhà phố' 
    ";
    $qNnhapho = mysqli_query($conn,$sNnhapho);
    $rNnhapho = array();
    while($row = mysqli_fetch_assoc($qNnhapho)){
        $rNnhapho[] = $row;
    }

    $sNBT = "select * from maunha
    where TenMien='Miền nam' and TenLoaiNha='Biệt thự' 
    ";
    $qNBT = mysqli_query($conn,$sNBT);
    $rNBT= array();
    while($row = mysqli_fetch_assoc($qNBT)){
        $rNBT[] = $row;
    }
    //mien trung
        $sTCap4 = "select * from maunha
        where TenMien='Miền trung' and TenLoaiNha='Cấp 4' 
        ";
        $qTCap4 = mysqli_query($conn,$sTCap4);
        $rTCap4 = array();
        while($row = mysqli_fetch_assoc($qTCap4)){
            $rTCap4[] = $row;
        }
        $sTnhapho = "select * from maunha
        where TenMien='Miền trung' and TenLoaiNha='Nhà phố' 
        ";
        $qTnhapho = mysqli_query($conn,$sTnhapho);
        $rTnhapho = array();
        while($row = mysqli_fetch_assoc($qTnhapho)){
            $rTnhapho[] = $row;
        }
        $sTBT = "select * from maunha
        where TenMien='Miền trung' and TenLoaiNha='Biệt thự' 
        ";
        $qTBT = mysqli_query($conn,$sTBT);
        $rTBT= array();
        while($row = mysqli_fetch_assoc($qTBT)){
            $rTBT[] = $row;
        }

        
        $s_t = "select * from tang
        ";
        $q_t= mysqli_query($conn,$s_t);
        $r_t= array();
        while($row = mysqli_fetch_assoc($q_t)){
            $r_t[] = $row;
        }
//ton
        $s_ton = "select * from ton
        ";
        $q_ton= mysqli_query($conn,$s_ton);
        $r_ton= array();
        while($row = mysqli_fetch_assoc($q_ton)){
            $r_ton[] = $row;
        }

       
//gachlatnen
        $s_gachlatnen = "select * from gachlatnen
        ";
        $q_gachlatnen = mysqli_query($conn,$s_gachlatnen);
        $r_gachlatnen = array();
        while($row = mysqli_fetch_assoc($q_gachlatnen)){
            $r_gachlatnen[] = $row;
        }
//son
        $s_son = "select * from son
        ";
        $q_son = mysqli_query($conn,$s_son);
        $r_son = array();
        while($row = mysqli_fetch_assoc($q_son)){
            $r_son[] = $row;
        }
//den
        $s_den = "select * from den
        ";
        $q_den = mysqli_query($conn,$s_den);
        $r_den = array();
        while($row = mysqli_fetch_assoc($q_den)){
            $r_den[] = $row;
}
//lavabo

        $s_lavabo = "select * from lavabo
        ";
        $q_lavabo = mysqli_query($conn,$s_lavabo);
        $r_lavabo = array();
        while($row = mysqli_fetch_assoc($q_lavabo)){
            $r_lavabo[] = $row;
        }





?>