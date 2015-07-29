<?php
require_once(__DIR__ . '/../helpers/html2pdf.php');
use Propel\Runtime\Propel;

$app->get('/pdf/signin', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if(is_null($app->request->get('id'))) {
        $app->status(406); 
        echo json_encode('You need to specify an id.');
        return; 
    }

    // set params
    $eventId = $app->request->get('id');

    // construct query
    $con = Propel::getConnection();

    $sql  =  'SELECT e.`id` as eventId, e.`name`, e.`event_code`, e.`date`, e.`contact_name`, e.`contact_phone`, ';
    $sql .=  's.`id` as shiftId, s.`start_time`, s.`end_time`, s.`description`, s.`cap`, ';
    $sql .=  'm.`id` as memberId, m.`first_name`, m.`last_name`, m.`email`, m.`phone`, ';
    $sql .=  'su.`driver` ';
    $sql .=  'FROM `events` as e ';
    $sql .=  'JOIN `shifts` as s ON e.`id` = s.`event` ';
    $sql .=  'LEFT JOIN `signups` as su ON s.`id` = su.`shift` ';
    $sql .=  'LEFT JOIN `members` as m ON su.`user` = m.`id` ';
    $sql .=  'WHERE e.`id` = ' . $eventId;
    
    $stmt = $con->prepare($sql);
    
    //debug
    // echo $sql;

    // execute and return
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // parse results
    $event = array(
        'id'                  => $result[0]['eventId'],
        'name'                  => $result[0]['name'],
        'code'                  => $result[0]['event_code'],
        'date'                  => $result[0]['date'],
        'contactName'           => $result[0]['contact_name'],
        'contactPhone'          => $result[0]['contact_phone']
    );

    $shifts = array();
    foreach($result as $row) {
        $tmp = array(
            'id'                => $row['shiftId'],
            'startTime'         => $row['start_time'],
            'endTime'           => $row['end_time'],
            'description'       => $row['description'],
            'cap'               => $row['cap']
        );

        array_push($shifts, $tmp);
    }
    $shifts = array_unique($shifts, SORT_REGULAR);

    $signups = array();
    foreach($shifts as $row) { $signups[ $row['id'] ] = array(); }
    foreach($result as $row) {
        if(!IS_NULL($row['first_name']) && !IS_NULL($row['last_name'])) { 
            $tmp = array(
                'firstName'    => $row['first_name'],
                'lastName'     => $row['last_name'],
                'email'        => $row['email'],
                'phone'        => $row['phone']
            );

            array_push($signups[ $row['shiftId'] ], $tmp);
        }
    }

    // // echo json_encode($result);
    // var_dump($signups);


    $pdf=new PDF_HTML();
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();
    $text='<html><head></head><body>Hello <b>There!</b></body></html>';
    if(ini_get('magic_quotes_gpc')=='1')
        $text=stripslashes($text);
    $pdf->WriteHTML($text);
    $pdf->Output();
    exit;
});
