<?php

namespace App\Http\Service;
use App\Models\Diskon;
use App\Http\Requests\StoreDiskonRequest;
use Carbon\Carbon;

class DiskonRepository implements DiskonInterface
{
    private $diskon;

    public function __construct(Diskon $diskon)
    {
        $this->diskon = $diskon;
    }

    public function findAll(){
        return $this->diskon->all();
    }

    public function findById($id){

    }
    
    public function store($request){

    }
    
    public function update($id, $request){

    }
    
    public function delete($id){

    }

    public function checkValidDiskon(StoreDiskonRequest $request){

        $diskon = 0;

        if( $request->codePromo == "FA111" ){
            $diskon = $request->totalAmount / 100 * 10;
        }

        if( $request->codePromo == "FA222" ){
            
            foreach ( $request->items as $item ){
                if( $item['code'] == "FA4532" ){
                    $diskon = $diskon + 50000;
                }
            }

        }

        if( $request->codePromo == "FA333" ){
            
            foreach ( $request->items as $item ){
                
                if( $item['amount'] > 400000 ){
                    $diskon = $diskon + $item['amount'] / 100 * 6;
                }
            }

        }

    
        if( $request->codePromo == "FA444" ){
            $d    = Carbon::parse();
            if( $d->format('l') == 'Tuesday' && ( $d->format('h') > 13 && $d->format('h') < 15 ) ){
                $diskon = $diskon + $request->totalAmount / 100 * 5;
            }
        }

        return $diskon;

    }

}
