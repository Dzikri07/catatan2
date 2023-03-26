@extends('templates.layout')

@push('css')
@endpush

@section('isi')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Penjualan Barang</h1>
        </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Transaksi</h3>
        </div>
        <div class="card-body">
          <section class="content">

            <div class="card">
              <div class="card-header">
                <h3>Form</h3>
              </div>
              <div class="card-body">
                <form method="post" action="transaksi" id="form-transaksi">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="id">Id Karyawan</label>
                      <input type="text" class="form-control" id="id" placeholder="Id" name="id" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nama">Tanggal Beli</label>
                      <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Beli" name="tanggal" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="telpon">Nama Barang</label>
                      <select class="custom-select" id="barang" name="barang">
                          <option selected disabled>Pilih Jenis Barang</option>
                          <option value="detergent" data-harga="15000">detergent</option>
                          <option value="pewangi" data-harga="10000">pewangi</option>
                          <option value="detergent sepatu" data-harga="25000">detergent sepatu</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="tanggal">Harga</label>
                      <input type="text" class="form-control" id="harga" placeholder="Harga" readonly name="harga" required let>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah"  min="0" step="1" value="0" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Pembayaran</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran1" value="Cash" checked>
                        <label class="form-check-label" for="pembayaran1">
                          Cash
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran2" value="E-money">
                        <label class="form-check-label" for="pembayaran2">
                          E-money
                        </label>
                      </div>
                    </div>
                  </div>&nbsp;
                 <div class="form-group row">
                  <label for="save" class="col-sm-4 col-form-label"></label>
                  <div class="col-sm-2">
                    <button type="button" class="form-control btn btn-primary" id="btn-insert">Submit</button>
                  </div>
                 </div>
                </form>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3>Data</h3>
              </div>
              <div class="card-body">
                <div class="mt-2 mb-2">
                  <div class="form-group row mt-2">
                    <div class="col-sm-2">
                       <button type="button" class="btn btn-success" id="btn-sorting">Urutkan</button>  
                    </div>
                    <div class="col-sm-4">
                      <input type="search" class="form-control" id="teks-cari">
                    </div>
                    <div class="col-sm-2">
                      <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                    </div>
                  </div>
                <table class="table table-bordered table-compact table-hover" id="data-transaksi">
                  <thead>
                    <tr>
                      <th>Id Karyawan</th>
                      <th>Tanggal Beli</th>
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Diskon</th>
                      <th>Total</th>
                      <th>Pembayaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="8" align="center">Belum Ada Data</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
            </section>
        </div>
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection

@push('js')
<script>
  function insertData(dataTransaksi){
    const data = $('#form-transaksi').serializeArray()

       // console.log(data)
       let newData = {}
       data.forEach(function(item, index){
         let name = item['name']
         let value = name === 'id' || name=='jumlah'? Number(item['value']) : item['value']
         newData[name] = value
       })
       console.log(newData)
 
       localStorage.setItem('dataTransaksi', JSON.stringify([...dataTransaksi, newData]))
       return newData
     }
  
   
  //  function searcing(){
  //    console.log('cari')
  //  }
  //  function sorting(){
  //    console.log('sorting')
  //  }
 
   function showData(arr){
       let row = ''
       
       if(arr.length == 0){
         return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
       }

       let jmlBarang = jmlDiskon = jmlTotal=0 
       arr.forEach(function(item, index){
        let harga = item['barang']=== "detergent"? 15000:(item['barang']==="pewangi"? 10000: 25000);
        let jmlHarga =harga *item['jumlah']
        let diskon = jmlHarga >=50000? jmlHarga * 0.15 :0
        let total = jmlHarga - diskon
        jmlBarang += item['jumlah']
        jmlDiskon += diskon 
        jmlTotal += total
         row += `<tr>`
         row += `<td>${item['id']}</td>`
         row += `<td>${item['tanggal']}</td>`
         row += `<td>${item['barang']}</td>`
         row += `<td>${item['harga']}</td>`
         row += `<td>${item['jumlah']}</td>`
         row += `<td>${diskon}</td>`
         row += `<td>${total}</td>`
         row += `<td>${item['pembayaran']}</td>`
         row += `</tr>`

       })
       row += '<tr style="font-weight:bold; background:#000;color:white">'
         row += `<td colspan="4">Jumlah Total</td>`
         row += `<td>${jmlBarang}</td>`
         row += `<td>${jmlDiskon}</td>`
         row += `<td colspan ="2">${jmlTotal}</td>`
         row += '</tr>'
       return row
     }

     function sorting(arr,key){
      let i,  j, id, value; 
      for (i = 1; i < arr.length; i++)
      { 
          value = arr[i]; 
          id = arr[i][key]
          j = i - 1; 
          while (j >= 0 && arr[j][key] > id)
          { 
              arr[j + 1] = arr[j]; 
              j = j - 1;  
          } 
          arr[j + 1] = value; 
      } 
      return arr
    }
    // function procedur(){
    //   var i = 2 + 2
    // }

    function searching(arr, key, teks){
      for(let i= 0; i < arr.length; i++){
        if(arr[i][key] == teks)
          return i
        }
      return -1
    }
  //   function filter (arr, Cash, eMoney){
  //     if(arr[0].construktor !== object){
  //       return false
  //     }
  //     // console.log(Cash === nill)
  //     let newArray = []
  //     if(Cash ===null){
  //       arr.forEach(function(item,index){
  //         if(item['pembayaran'] === 'E-Money'){
  //           let indexArray= {}
  //           indexArray['id'] = item['id']
  //           indexArray['tanggal'] = item['tanggal']
  //           indexArray['barang'] = item['barang']
  //           indexArray['harga'] = item['harga']
  //           indexArray['jumlah'] = item['jumlah']
  //           indexArray['pembayaran'] = item['pembayaran']

  //           newArray.push(indexArray)
  //         }
  //       })
  //       return newArray
  //     }else if (eMoney === null){
  //       if(Cash ===null){
  //       arr.forEach(function(item,index){
  //         if(item['pembayaran'] === 'E-Money'){
  //           let indexArray= {}
  //           indexArray['id'] = item['id']
  //           indexArray['tanggal'] = item['tanggal']
  //           indexArray['barang'] = item['barang']
  //           indexArray['harga'] = item['harga']
  //           indexArray['jumlah'] = item['jumlah']
  //           indexArray['pembayaran'] = item['pembayaran']

  //           newArray.push(indexArray)
  //         }
  //       })
  //       return newArray
  //     }else{
  //       return arr
  //     }
  //   }
  //  }

   $(function(){
     // initialize
     let dataTransaksi = JSON.parse(localStorage.getItem('dataTransaksi')) || []
     $('#data-transaksi tbody').html(showData(dataTransaksi))
 
    //event klik input data
    $('#btn-insert').on('click',function(){
      //  e.prevantDefault()
         dataTransaksi.push(insertData(dataTransaksi)) 
         $('#data-transaksi tbody').html(showData(dataTransaksi))
       })
 
    //event klik sorting
    $('#btn-sorting').on('click',function(){
        dataTransaksi = sorting(dataTransaksi, 'nama')

        $('#data-transaksi tbody').html(showData(dataTransaksi))
      })

     //event klik searching
      $('#btn-search').on('click',function(){
        let teksSearch = $('#teks-cari').val()
        let id = searching(dataTransaksi,'nama', teksSearch)
        let data = []
        if(id >= 0)
          data.push(dataTransaksi[id])
        console.log(id)
        console.log(data)
        $('#data-transaksi tbody').html(showData(data))
      })

      $('#barang').on('change', function(){
        //ambil data dari element option
        const harga = $('#barang option:selected').data('harga');

        $('[name=harga]').val(harga);
    })
//filter search
      // $('#filter').on('click',function(){
      //   let inputCash =$('#Cash').is(':checked') ? 'Cash' || null
      //   let inputEmoney = $('#E-Money').is(':checked') ? 'E-Money' || null
      //   data = filter(dataTransaksi, inputCash, inputEmoney)
      //   $('#data-transaksi tbody').html(showData(data))
      // })
 
    })

    </script>
@endpush