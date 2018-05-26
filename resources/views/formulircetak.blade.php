@extends('layouts.app')
@section('content')
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <table border="1" width="100%">
                <tr>
                  <th colspan="5">I.DATA PEGAWAI</th>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td colspan="2">xxxxxxxxxxxxx</td>
                  <td>NIP</td>
                  <td>xxxxxxxx</td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td colspan="2"></td>
                  <td>Masa Kerja</td>
                  <td>XXXXXXX</td>
                </tr>
                <tr>
                  <td>Unit Kerja</td>
                  <td colspan="4"></td>
                  
                </tr>
                <tr>
                  <th colspan="5">II.DATA CUTI</th>
                </tr>
                <tr>
                  <td>1.Cuti Tahunan</td>
                  <td><input type="checkbox" class="minimal" ></td>
                  <td>2.Cuti Besar</td>
                  <td colspan="2"><input type="checkbox" class="minimal" ></td>
                </tr>
                <tr>
                  <td>3.Cuti Sakit</td>
                  <td><input type="checkbox" class="minimal" ></td>
                  <td>4.Cuti Melahirkan</td>
                  <td colspan="2"><input type="checkbox" class="minimal" ></td>
                </tr>
                <tr>
                  <td>5.Cuti Karena Alasan Penting</td>
                  <td><input type="checkbox" class="minimal" ></td>
                  <td>6.Cuti di Luar Tanggungan Negara</td>
                  <td colspan="2"><input type="checkbox" class="minimal" ></td>
                </tr>
                 <tr>
                  <th colspan="5">III.ALASAN CUTI</th>
                </tr>
                <tr>
                  <td colspan="5">Ingin Libur</td>
                </tr>
                <tr>
                  <th colspan="5">IV.LAMANYA CUTI</th>
                </tr>
                <tr>
                  <td>Selama</td>
                  <td>(hari/bulan/tahun)*</td>
                  <td>Mulai tanggal</td>
                  <td>s/d</td>
                  <td></td>
                </tr>
                 <tr>
                  <td>x</td>
                  <td>x</td>
                  <td>x</td>
                  <td>x</td>
                  <td></td>
                </tr>
                 <tr>
                  <th colspan="5">V.CATATAN CUTI</th>
                </tr>
                <tr>
                  <td colspan="3">1.CUTI TAHUNAN</td>
                  <td>2.CUTI BESAR</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>Sisa</td>
                  <td>Keterangan</td>
                  <td>3.CUTI SAKIT</td>
                  <td></td>
                </tr>
                  <tr>
                  <td>N-2</td>
                  <td></td>
                  <td></td>
                  <td>4.CUTI MELAHIRKAN</td>
                  <td></td>
                </tr>
                <tr>
                  <td>N-1</td>
                  <td></td>
                  <td></td>
                  <td>5.CUTI KARENA ALASAN PENTING</td>
                  <td></td>
                </tr>
                 <tr>
                  <td>N</td>
                  <td></td>
                  <td></td>
                  <td>6.CUTI DI LUAR TANGGUNGAN NEGARA</td>
                  <td></td>
                </tr>
                 <tr>
                  <th colspan="5">VI.ALAMAT SELAMA MENJALANKAN CUTI</th>
                </tr>
                <tr>
                  <td colspan="3"><textarea class="form-control" rows="2"></textarea></td>
                  <td>Telepon</td>
                  <td></td>
                </tr>
               <tr>
                  <td></td>
                  <td></td>
               </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>