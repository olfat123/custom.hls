<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;


class PayConfirmation
{
    //
    private $respSelect = null;
    private $respUpdate = null;
    private $orderId = null;
    private $paymentStatus = null;
    private $USERID = null;

    public function confirmSuscritpionToDeleteDemo($USERID){

        $this->USERID = $USERID;

    
        try{
            

           $this->respSelect = DB::Select("SELECT O.id, O.user_id,O.invoice_id, SO.product_id, 
                                                                    SO.price,  P.name, O.status, I.payment_status
                                                            FROM orders AS O
                                                            INNER JOIN invoices AS I
                                                            ON O.invoice_id = I.id
                                                            INNER JOIN suborders AS SO
                                                            ON O.id = SO.order_id
                                                            INNER JOIN products AS P
                                                            ON SO.product_id = P.id 
                                                            INNER JOIN USER AS U
                                                            ON U.USERID = O.user_id
                                                            WHERE O.user_id = $USERID
                                                            ORDER BY (O.id) DESC LIMIT 1"
                                                );

            
            foreach($this->respSelect as $X=>$Value){
                
                 $this->orderId = $Value->id;
                 $this->paymentStatus = $Value->payment_status;
            }

        

            if($this->paymentStatus == 'approved'){ 

                if(DB::table('orders')
                        ->where('id',$this->orderId)
                        ->update(['status' => 'Cancelled']) == 1){

                            //dd('estoy dentro del segundo if');

                            $prueba = $this->USERID;

                   if(DB::update("UPDATE USER SET START_SUSCRIPTION = now(), 
                                                  END_SUSCRIPTION =  DATE_ADD(now(),INTERVAL 365 DAY),
                                                  trial_until = NULL 
                                                  WHERE USERID = $prueba")){

                                return redirect()->to('/glossary');

                    }else{
                        
                        return redirect('suscription')->with('status');
                        
                    }
                }
    

            }
     
            //return response()->json($RESPONSE,201);        

        }catch(SQLException $e){

            return response()->json(array('message' =>$e->getMessage()));

        }
        
    }
}

/*DB::table('USER')
                        ->where('USERID', $this->USERID)
                        ->update(['START_SUSCRIPTION' => now(),
                                    'END_SUSCRIPTION' => $endSuscription,
                                    'trial_until' => 'NULL'])*/