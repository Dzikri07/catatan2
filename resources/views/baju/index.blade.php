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
            <h1>Nama</h1>
        </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Baju</h3>
        </div>
        <div class="card-body">
          <section class="content">

            <div class="card">
              <div class="card-header">
                <h3>Form</h3>
              </div>
              <div class="card-body">
                <form method="post" action="Baju" id="form-Baju">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="id">Id Karyawan</label>
                      <input type="text" class="form-control" id="id" placeholder="Id" name="id" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="nama">Nama Pembeli</label>
                      <input type="text" class="form-control" id="nama" placeholder="Tanggal Beli" name="nama" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="nama">Tanggal Beli</label>
                      <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Beli" name="tanggal" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="telpon">Warna</label>
                      <select class="custom-select" id="warna" name="warna">
                          <option selected disabled>Pilih Ukuran</option>
                          <option value="Merah">Merah</option>
                          <option value="Hijau">Hijau</option>
                          <option value="Putih">Putih</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telpon">Nama Barang</label>
                      <select class="custom-select" id="barang" name="barang">
                          <option selected disabled>Pilih Ukuran</option>
                          <option value="S" data-harga="30000">S</option>
                          <option value="M" data-harga="25000">M</option>
                          <option value="L" data-harga="35000">L</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tanggal">Harga</label>
                      <input type="text" class="form-control" id="harga" placeholder="Harga" readonly name="harga" required let>
                    </div>
                    
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah"  min="0" step="1" value="0" required>
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
                <table class="table table-bordered table-compact table-hover" id="data-Baju">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Tanggal Beli</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Harga Barang</th>
                      <th>Warna</th>
                      <th>disc</th>
                      <th>total</th>
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
          
            
        </div>
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection

@push('js')
<script>
  function insertData(dataBaju){
    const data = $('#form-Baju').serializeArray()

       // console.log(data)
       let newData = {}
       data.forEach(function(item, index){
         let name = item['name']
         let value = name === 'id' || name=='jumlah'? Number(item['value']) : item['value']
         newData[name] = value
       })
       console.log(newData)
 
       localStorage.setItem('dataBaju', JSON.stringify([...dataBaju, newData]))
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
        let harga = item['barang']=== "S"? 30000:(item['barang']==="M"? 25000: 35000);
        let jmlHarga =harga *item['jumlah']
        let diskon = jmlHarga >=50000? jmlHarga * 0.10 :0
        let total = jmlHarga - diskon
        jmlBarang += item['jumlah']
        jmlDiskon += diskon 
        jmlTotal += total
         row += `<tr>`
         row += `<td>${item['id']}</td>`
         row += `<td>${item['nama']}</td>`
         row += `<td>${item['tanggal']}</td>`
         row += `<td>${item['barang']}</td>`
         row += `<td>${item['jumlah']}</td>`
        
         row += `<td>${item['harga']}</td>`
          row += `<td>${item['warna']}</td>`
         row += `<td>${diskon}</td>`
         row += `<td>${total}</td>`
         row += `</tr>`

       })
       row += '<tr style="font-weight:bold; background:#000;color:white">'
         row += `<td colspan="4">Jumlah Total</td>`
         row += `<td>${jmlBarang}</td>`
         row += `<td>${jmlDiskon}</td>`
         row += `<td colspan ="3">${jmlTotal}</td>`
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
    function filter(arrays, key){
        let filtered = []
        if (key.length == 0){
            return arrays   
        }
        key.forEach((i) => {
          x = arrays.filter(array => array['pembayaran'] == i )
          filtered = [...filtered, ...x]
        })
        return filtered
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
     let dataBaju = JSON.parse(localStorage.getItem('dataBaju')) || []
     $('#data-Baju tbody').html(showData(dataBaju))
 
    //event klik input data
    $('#btn-insert').on('click',function(){
      //  e.prevantDefault()
         dataBaju.push(insertData(dataBaju)) 
         $('#data-Baju tbody').html(showData(dataBaju))
       })
 
    //event klik sorting
    $('#btn-sorting').on('click',function(){
        dataBaju = sorting(dataBaju, 'harga')

        $('#data-Baju tbody').html(showData(dataBaju))
      })

     //event klik searching
      $('#btn-search').on('click',function(){
        let teksSearch = $('#teks-cari').val()
        let id = searching(dataBaju,'barang', teksSearch)
        let data = []
        if(id >= 0)
          data.push(dataBaju[id])
        console.log(id)
        console.log(data)
        $('#data-Baju tbody').html(showData(data))
      })

      $('.filter').on('click', function(){
            const checked = [...document.querySelectorAll('.filter:checked')].map(e => e.value);
            const data = filter(dataBaju, checked)
            $('#data-Baju tbody').html(showData(data))
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
      //   data = filter(dataBaju, inputCash, inputEmoney)
      //   $('#data-Baju tbody').html(showData(data))
      // })
 
    })

    </script>
@endpush