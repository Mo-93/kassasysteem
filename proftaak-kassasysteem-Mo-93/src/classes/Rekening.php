<?php

namespace Acme\classes;


use Acme\model\ProductModel;
use Acme\model\ProductTafelModel;
use Acme\model\TafelModel;
use DateTime;

class Rekening
{

    public function setPaid($idTafel): void
    {
        //TODO: de rekening voor een bepaalde tafel op betaald zetten

        $bm = new ProductTafelModel();
        $producten = $bm->getAll(array('idTafle'=>$idTafel));

        foreach ($producten as $product)
        $product->setColumnValue('betaald',true);
        $product->save();

    
        
    }

    /**
     * @param $idTafel
     *
     * @return array
     */
    public function getBill($idTafel): array
    {
        $bill = [];
        $bm = new ProductTafelModel();
        $bestelling = $bm->getBestelling($idTafel);

        $tm = new TafelModel();

        $bill['tafel'] = $tm->getTafel($idTafel);
        $bill['datumtijd'] = [
            'timestamp' => $bestelling['datumtijd'],
            'formatted' => date(
                'd-m-y',
                $bestelling['datumtijd']
            ),
            "time"=>date('h:i:s'),$bestelling['datumtijd']
        ];

        
        if (isset($bestelling['products'])) {
            foreach ($bestelling['products'] as $idProduct) {
                if(!isset($bill['products'][$idProduct]['data'])) {
                    $bill['products'][$idProduct]['data'] = (new ProductModel(
                    ))->getProduct(
                        $idProduct
                    );
                }
                if (!isset($bill['products'][$idProduct]['aantal'])) $bill['products'][$idProduct]['aantal'] = 0;
                $bill['products'][$idProduct]['aantal']++;
            }
        }

        //TODO: 'totaal' toevoegen aan de rekening

    
        $bill['totaal'] = 350;
        
        return $bill;
    }

}