@extends('layouts.admin')

@section('title')Users @endsection
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

/* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
} */

.container {
  /* height: 100vh; */
  width: 100%;
  align-items: center;
  display: flex;
  justify-content: center;
  background-color: #fcfcfc;
}

.card {
  border-radius: 10px;
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
  width: 600px;
  height: 260px;
  background-color: #ffffff;
  padding: 10px 30px 40px;
}

.card h3 {
  font-size: 22px;
  font-weight: 600;
  
}

.drop_box {
  margin: 10px 0;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border: 3px dotted #a3a3a3;
  border-radius: 5px;
}

.drop_box h4 {
  font-size: 16px;
  font-weight: 400;
  color: #2e2e2e;
}

.drop_box p {
  margin-top: 10px;
  margin-bottom: 20px;
  font-size: 12px;
  color: #a3a3a3;
}

.btn {
  text-decoration: none;
  background-color: #005af0;
  color: #ffffff;
  padding: 10px 20px;
  border: none;
  outline: none;
  transition: 0.3s;
}

.btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
}
.form input {
  margin: 10px 0;
  width: 100%;
  background-color: #e2e2e2;
  border: none;
  outline: none;
  padding: 12px 20px;
  border-radius: 4px;
}

</style>
@section('content')
<form action="{{route("import.store")}}" method="post" enctype="multipart/form-data">
  @csrf
  json:=><input type="file" name="jsonFile" id="">
  xlsx:=><input type="file" name="xlsxFile" id="">
  <button type="submit">Submit</button>
</form>
{{-- <form action="{{route("import.store")}}" method="post" enctype="multipart/form-data">
  <div class="container display-flex">
    <div class="card">
      <h3>Upload Json file</h3>
      <div class="drop_box">
        <header>
          <h4>Select File here</h4>
        </header>
        <p>Files Supported: JSON</p>
        <input type="file" hidden name="json" id="fileID">
        <button type="button" class="btn" id="jsonButton">Choose File</button>
      </div>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="card">
      <h3>Upload Xlsx File</h3>
      <div class="drop_box">
        <header>
          <h4>Select File here</h4>
        </header>
        <p>Files Supported: XLSX</p>
        <input type="file" hidden name="xlsx" id="fileID2">
        <button class="btn" id="xlsxButton">Choose File</button>
      </div>
    </div>
      <button class="btn" type="submit">submit</button>
  </div>
</form> --}}
  @push('page_script')

      @include('include.dataTableScripts')   

      <script src="{{ asset('js/pages/users/index.js') }}"></script>
  <script>
    
  //   var xlsxButton = $("#xlsxButton");
  //   var jsonButton = $("#jsonButton");
  //   var xlsx = $("#xlsx");
  //   var json = $("#json");
  //   jsonButton.onclick = () => {
  //     json.click();
  // };
  // xlsxButton.onclick = () => {
  //   xlsx.click();
  // };
  </script>
  @endpush

	     
@endsection