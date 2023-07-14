<?php

namespace App\Http\Controllers;

use App\Mail\sendNotifications;
use App\Models\production_line;
use App\Models\production_lines_status;
use Illuminate\Support\Facades\Mail;

class production_lineController extends Controller
{
   public function index($line_number){
      $production_lines = production_line::where('line_number', $line_number)->first();
    //$production_lines = production_line::all();
    return response()->json($production_lines);
   }
   public function showAllLines(){
      $production_lines = production_lines_status::all();
      
      return response()->json( $production_lines);
   }

   public function andonActivationUpdate($line_number, $reason){
      $production_line = production_lines_status::where('line_number', $line_number)->first();
      
      if ($production_line) {
      
      $production_line->reason = $reason;// $request->input('reason');
      $production_line->stopped_at = now();
      $production_line->current_status = 'STOPPED';
      $production_line->save();
      $this->andonActiveEmail($production_line);
      return response()->json( $production_line);
      }else {
         return "line number doesn't exist";
      }
   }
   public function andonUnactivationUpdate($line_number, $andonTime){
      
      $production_line = production_lines_status::where('line_number', $line_number)->first();
      if ($production_line) {

         $production_line->reason = 'PRODUCTION';
         $production_line->runing_at = now();
         $production_line->stopped_at = null;
         $production_line->current_status = 'RUNNING';
         $production_line->cumulative_stoppage_time = $andonTime;
         $production_line->save();
         $this->andonActiveEmail($production_line);
         return response()->json( $production_line);
         
      }else{
         return "line number doesn't exist";
      }
   }

   public function getCST($line_number){
      $PLS = production_lines_status::where('line_number', $line_number)->first();
      if ($PLS) {
         $CST = [
            'cumulative_stoppage_time'=> $PLS->cumulative_stoppage_time,
            'stopped_at' => $PLS->stopped_at
         ];

         return response()->json($CST);
      }else{
         return "line number doesn't exist";
      }
   }

   public function andonActiveEmail($production_line){
      
      $correo = new sendNotifications($production_line);
      Mail::to('AldoGuadalupe.Armenta@zkw.mx')->send($correo);
      return 'correo enviado';
   }
   public function updateDates(){
      $PL = production_lines_status::all();
      
      //dd($PL);
      if ($PL) {
         for ($i=0; $i <sizeof($PL) ; $i++) { 
            $PL[$i]->reason = 'PRODUCTION';
            $PL[$i]->runing_at = now();
            $PL[$i]->stopped_at = null;
            $PL[$i]->current_status = 'RUNNING';
            $PL[$i]->cumulative_stoppage_time = '00:00:00.0000';
            $PL[$i]->save();
         }
         return 'actualizado';
      }
   }


   
}
