<?php

namespace App\Services;

class Cbrs {
    private $docs = [];
    private $num_docs = 0;
    private $corpus_terms = []; 
    private $doc_weight = []; 

    /**
     * Membuat indeks untuk terms dari semua dokumen
     *
     * @param array $documents Data dokumen
     */

    # 1
    public function create_index($d) {
        $this->docs = $d;
        $this->num_docs = count($d); 
        foreach($d as $k => $dv){
            $doc_terms = [];
            $doc_terms = explode(" ", $dv);//memecah string $dv menjadi array berdasarkan spasi sebagai pemisah. Hasilnya disimpan dalam array $doc_terms.
            $num_terms = count($doc_terms);
            for($j=0; $j < $num_terms; $j++) {
                $term = strtolower($doc_terms[$j]); //mengubah elemen saat ini menjadi huruf kecil dan menyimpannya dalam variabel $term.
                $this->corpus_terms[$term][] = array($k, $j);
                // foreach($this->corpus_terms[$term] as $row){
                //     foreach($row as $col){
                //         echo $col." ";
                //     }
                // }
            }
        }
    }

    /**
     * 2 Menghitung nilai IDF untuk setiap istilah
     */
    public function idf() {
        $ndf = [];
        foreach($this->corpus_terms as $t => $terms){
			$df  = $this->df($t);
            $ddf = $this->num_docs/$this->df($t);
            $idf = round(log10($ddf), 4);
        
            $ndf[$t][0] = $df;
            $ndf[$t][1] = $idf;
		}	

        return $ndf;
    }
     #2.1
    public function df($term) {
        $d = array();
        $tr = $this->corpus_terms[$term];
        foreach($tr as $t)
            $d[] = $t[0];

        $dx = array_unique($d);
        return count($dx);

    }

    # 3
    public function weight(){
        $ndw = [];
        foreach($this->docs as $k=>$d){
            $dterm = explode(" ",$d);
            $dx = array_count_values($dterm);
            foreach($this->idf() as $t => $terms){
                if(empty($dx[$t]))
                    $ndw[$k][$t] = 0;    
                else $ndw[$k][$t] = $dx[$t] * $terms[1];
            }
        }
        $this->doc_weight = $ndw;
        return $ndw;
    }

    # 4
    public function similarity($d1){
        // foreach( $this->doc_weight as $row){
        //     foreach($row as $col){
        //         echo $col." ";
        //     };
        // };
        $score = [];
        foreach($this->doc_weight as $ndw => $w){
            $score[$ndw] = $this->cosim($d1, $ndw);
        }

        // arsort($score);
        // foreach($score as $row){
        //     echo $row;
        //     echo " ";
        // };
        return $score;
    }

    # 4.1
    private function cosim($d1, $d2){
        // echo $d1;
        
        $dw = $this->doc_weight;

        
        # sum square dari 2 doc
        $dw1 = $dw[$d1];
        $dw2 = $dw[$d2];

              
        $dx = 0;
        $dx1 = 0;
        $dx2 = 0;

        foreach($this->corpus_terms as $t => $terms){
            $dx += $dw1[$t] * $dw2[$t];
            $dx1 += $dw1[$t] * $dw1[$t];
            $dx2 += $dw2[$t] * $dw2[$t]; 
        }
        
        return round($dx / (sqrt($dx1) * sqrt($dx2)), 4);
    }

 
}
