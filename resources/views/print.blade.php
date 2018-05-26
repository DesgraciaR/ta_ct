<?php $active ='home' ; ?>
@extends('layouts.pgprint')
@section('content')
@php($data = \GlobalHelper::accessdata($cetakform->nip_baru))


<div class="row">
              <div class="box-pull-right" >
                  <p class="filename">
                    Yogyakarta, {{$cetakform->tgl_pengajuan}}
                  <p>Kepada
                  <p>Yth
                  &nbsp;<p>@if($cetakform->id_atasan == session()->get("data")->nip_atasan)</p>
                        <p>{{session()->get("data")->jabatan_atasan}}<p>
                          @else
                        <p>{{session()->get("data")->jabatan_atasan_atasan}}</p>
                  
                       @endif
                  
                  <p>di Kantor Regional I BKN</p>
                  <p>Yogyakarta</p>
                 </p>
                  
              </div>

                <div class="8"></div>
            
              <table class="table1" border="1" width="100%" position="center">
                <tr>
                  <td colspan="6"><b>I.DATA PEGAWAI</b></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td colspan="2">{{$cetakform->user->nama}}</td>
                  <td>NIP</td>
                  <td colspan="2">{{$cetakform->user->nip_baru}}</td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td colspan="2">{{$data->jab_olah}}</td>
                  <td>Masa Kerja</td>
                  <td colspan="2">{{$data->mk_tahun}}</td>
                </tr>
                <tr>
                  <td>Unit Kerja</td>
                  <td colspan="5">{{$data->namaunor}}</td>
                </tr>
                <tr>
                  <td colspan="6"><b>II.DATA CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="2">1.Cuti Tahunan</td>
                  <td><input type="checkbox" class="minimal" ></td>
                  <td colspan="2">2.Cuti Besar</td>
                  <td><input type="checkbox" class="minimal" ></td>
                </tr>
                <tr>
                  <td colspan="2">3.Cuti Sakit</td>
                  <td><input type="checkbox" class="minimal" ></td>
                  <td colspan="2">4.Cuti Melahirkan</td>
                  <td><input type="checkbox" class="minimal" ></td>
                </tr>
                <tr>
                  <td colspan="2">6.Cuti Karena Alasan Penting</td>
                  <td><input type="checkbox" class="minimal" ></td>
                  <td colspan="2">6.Cuti di Luar Tanggungan Negara</td>
                  <td><input type="checkbox" class="minimal" ></td>
                </tr>
                 <tr>
                  <td colspan="6"><b>III.ALASAN CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="6">{{$cetakform->alasan_cuti}}</td>
                </tr>
                <tr>
                  <td colspan="6"><b>IV.LAMANYA CUTI</b></td>
                </tr>
                <tr>
                  <td>Selama</td>
                  <td>*</td>
                  <td>Mulai tanggal</td>
                  <td>{{$cetakform->tgl_mulai_ubah?:$cetakform->tgl_mulai}}</td>
                  <td>s/d</td>
                  <td>{{$cetakform->tgl_mulai_ubah?:$cetakform->tgl_selesai}}</td>
                </tr>
                 <tr>
                  <td colspan="6"><b>V.CATATAN CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="3">1.CUTI TAHUNAN</td>
                  <td colspan="2">2.CUTI BESAR</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>Sisa</td>
                  <td>Keterangan</td>
                  <td colspan="2">3.CUTI SAKIT</td>
                  <td></td>
                </tr>
                  <tr>
                  <td>N-2</td>
                  <td></td>
                  <td></td>
                  <td colspan="2">4.CUTI MELAHIRKAN</td>
                  <td></td>
                </tr>
                <tr>
                  <td>N-1</td>
                  <td></td>
                  <td></td>
                  <td colspan="2">6.CUTI KARENA ALASAN PENTING</td>
                  <td></td>
                </tr>
                 <tr>
                  <td>N</td>
                  <td></td>
                  <td></td>
                  <td colspan="2">6.CUTI DI LUAR TANGGUNGAN NEGARA</td>
                  <td></td>
                </tr>
                 <tr>
                  <td colspan="6"><b>VI.ALAMAT SELAMA MENJALANKAN CUTI</b></td>
                </tr>
                <tr>
                  <td colspan="3" rowspan="2">{{$cetakform->alamat_cuti}}</td>
                  <td>Telepon</td>
                  <td colspan="2">{{$cetakform->noTelepon}}</td>
                </tr>
               <tr>
                  <td colspan="3"><textarea rows="2" cols="30"> Hormat Saya</textarea></td>
               </tr>
               <tr>
                 <td colspan="6"><b>VII.PERTIMBANGAN ATASAN LAGSUNG</b></td>
               </tr>
               <tr>
                 <td>DISETUJUI</td>
                 <td>PERUBAHAN</td>
                 <td>DITANGGUHKAN</td>
                 <td colspan="3">TIDAK DISETUJUI</td>
               </tr>
                <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td colspan="3"></td>
               </tr>
               <tr>
                 <td colspan="3"></td>
                 <td colspan="3">
                      &nbsp;
                      <p class="center">@if($cetakform->id_atasan == session()->get("data")->nip_atasan)
                        <h>{{session()->get("data")->nama_atasan}}</h>
                          @else
                       <h>{{session()->get("data")->nama_atasan_atasan}}</h>
                       @endif

                      &nbsp; {{$cetakform->id_atasan}}</p>
                 </td>
                 
               </tr>
               <tr>
                 <td colspan="6"><b>VII.KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN PERSETUJUAN</b></td>
               </tr>
               <tr>
                 <td>DISETUJUI</td>
                 <td>PERUBAHAN</td>
                 <td>DITANGGUHKAN</td>
                 <td colspan="3">TIDAK DISETUJUI</td>
               </tr>
               <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td colspan="3"></td>
               </tr>
                
              </table>
            </div>
</div>
 
</body> 
</html>