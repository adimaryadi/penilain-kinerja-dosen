@extends('home')
@section('element_penilaian')
    <div class="element-penilaian">
        <div class="box box-primary">
            <div class="box-header">
                <h3>Penilaian Hasil</h3>
            </div>
            
            <div class="box-body">
                <table id="tabel" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ELEMEN PENILAIAN</th>
                            <th>SKOR</th>
                            <th>Sangat Baik</th>
                            <th>Baik</th>
                            <th>Cukup</th>
                            <th>Kurang Baik</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($element_penilaian))
                            <?php $no     =    1; ?>
                            <?php 
                                $sangat_baik            =      5;
                                $baik                   =      4;
                                $cukup                  =      3;
                                $kurang_baik            =      2;
                                $sangat_kurang_baik     =      1; 
                                $array_sum              =      []; 
                                $array_sum_sangat_baik  =      [];
                                $array_sum_baik         =      [];
                                $array_sum_cukup        =      [];
                                $array_sum_kurang_baik  =      [];
                            ?>
                            @foreach ($element_penilaian as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->element }}</td>
                                    <td>
                                        <?php
                                             $hitung_skor   =       $item->sangat_baik * $sangat_baik + $item->baik * $baik + $item->cukup * $cukup + $item->kurang_baik * $kurang_baik / 3;
                                             echo (int)$hitung_skor;
                                             array_push($array_sum, (int)$hitung_skor);
                                        ?>
                                    </td>
                                    <td>
                                        {{ $item->sangat_baik }}
                                        <?php array_push($array_sum_sangat_baik, $item->sangat_baik); ?>
                                    </td>
                                    <td>
                                        {{ $item->baik }}
                                        <?php array_push($array_sum_baik, $item->baik); ?>
                                    </td>
                                    <td>
                                        {{ $item->cukup }}
                                        <?php array_push($array_sum_cukup, $item->cukup); ?>
                                    </td>
                                    <td>
                                        {{ $item->kurang_baik }}
                                        <?php array_push($array_sum_kurang_baik, $item->kurang_baik); ?>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td style="text-align: center;">Skor</td>
                                    <td>
                                        <?php 
                                            $skor_sum   =      array_sum($array_sum);
                                            echo $skor_sum;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $sum_sangat_baik      =      array_sum($array_sum_sangat_baik);
                                            echo (int)$sum_sangat_baik;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $sum_array_sum_baik      =      array_sum($array_sum_baik);
                                            echo (int)$sum_array_sum_baik;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $sum_array_sum_cukup      =      array_sum($array_sum_cukup);
                                            echo (int)$sum_array_sum_cukup;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $sum_array_sum_kurang_baik      =      array_sum($array_sum_kurang_baik);
                                            echo (int)$sum_array_sum_kurang_baik;
                                        ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="text-align: center;">Rata Rata</td>
                                    <td>
                                        <?php 
                                            $avarage        =      array_sum($array_sum)/count($array_sum);
                                            echo (int)$avarage;
                                            
                                            $data_average   =      array($sum_sangat_baik,$sum_array_sum_baik,$sum_array_sum_cukup,$sum_array_sum_kurang_baik);
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $average_sum_sangat_baik    =       $sum_sangat_baik/array_sum($data_average);
                                            echo $average_sum_sangat_baik;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $average_sum_baik    =       $sum_array_sum_baik/array_sum($data_average);
                                            echo $average_sum_baik;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $sum_array_sum_cukup    =       $sum_array_sum_cukup/array_sum($data_average);
                                            echo $sum_array_sum_cukup;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $sum_array_sum_kurang_baik    =       $sum_array_sum_kurang_baik/array_sum($data_average);
                                            echo $sum_array_sum_kurang_baik;
                                        ?>
                                    </td>
                                </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection