@extends('layouts.admin')

@section('title')Users @endsection
<style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: "Inter", sans-serif;
  }
  .formbold-mb-5 {
    margin-bottom: 20px;
  }
  .formbold-pt-3 {
    padding-top: 12px;
  }
  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 550px;
    width: 100%;
    background: white;
  }
  .formbold-form-label {
    display: block;
    font-weight: 500;
    font-size: 16px;
    color: #07074d;
    margin-bottom: 12px;
  }
  .formbold-form-label-2 {
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 20px;
  }

  .formbold-form-input {
    width: 100%;
    padding: 12px 24px;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
    background: white;
    font-weight: 500;
    font-size: 16px;
    color: #6b7280;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .formbold-btn {
    text-align: center;
    font-size: 16px;
    border-radius: 6px;
    padding: 14px 32px;
    border: none;
    font-weight: 600;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .formbold--mx-3 {
    margin-left: -12px;
    margin-right: -12px;
  }
  .formbold-px-3 {
    padding-left: 12px;
    padding-right: 12px;
  }
  .flex {
    display: flex;
  }
  .flex-wrap {
    flex-wrap: wrap;
  }
  .w-full {
    width: 100%;
  }

  .formbold-file-input input {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
  }

  .formbold-file-input label {
    position: relative;
    border: 1px dashed #e0e0e0;
    border-radius: 6px;
    min-height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
    text-align: center;
  }
  .formbold-drop-file {
    display: block;
    font-weight: 600;
    color: #07074d;
    font-size: 20px;
    margin-bottom: 8px;
  }

  .formbold-or {
    font-weight: 500;
    font-size: 16px;
    color: #6b7280;
    display: block;
    margin-bottom: 8px;
  }
  .formbold-browse {
    font-weight: 500;
    font-size: 16px;
    color: #07074d;
    display: inline-block;
    padding: 8px 28px;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
  }

  .formbold-file-list {
    border-radius: 6px;
    background: #f5f7fb;
    padding: 16px 32px;
  }

  .formbold-file-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .formbold-file-item button {
    color: #07074d;
    border: none;
    background: transparent;
    cursor: pointer;
  }

  .formbold-file-name {
    font-weight: 500;
    font-size: 16px;
    color: #07074d;
    padding-right: 12px;
  }
  .formbold-progress-bar {
    margin-top: 20px;
    position: relative;
    width: 100%;
    height: 6px;
    border-radius: 8px;
    background: #e2e5ef;
  }

  .formbold-progress {
    position: absolute;
    width: 75%;
    height: 100%;
    left: 0;
    top: 0;
    background: #6a64f1;
    border-radius: 8px;
  }

  @media (min-width: 540px) {
    .sm\:w-half {
      width: 50%;
    }
  }

</style>
@section('content')
 
<div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      <form action="#" method="POST">
         <div class="formbold-mb-5 formbold-file-input">
            <input type="file" name="file" id="file" />
            <label for="file">
              <div>
                <span class="formbold-drop-file"> Upload json files here </span>
                <span class="formbold-or"> Or </span>
                <span class="formbold-browse"> Browse </span>
              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div>
                <span class="formbold-drop-file"> Upload Xlsx files here </span>
                <span class="formbold-or"> Or </span>
                <span class="formbold-browse"> Browse </span>
              </div>
            </label>
          </div>
        <div>
          <button class="formbold-btn w-full">Send File</button>
        </div>
      </form>
    </div>
  </div>
  @push('page_script')

      @include('include.dataTableScripts')   

      <script src="{{ asset('js/pages/users/index.js') }}"></script>

  @endpush

	     
@endsection