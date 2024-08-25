<?php 

use Carbon\Carbon;
use App\Models\User;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Log;

const RECORD_PER_PAGE = 10;
const MANAGE_USERS = 1;
const MANAGE_CUSTOMERS = 2;
const MANAGE_ROLES = 3;

function generateBarcode($info){
    $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
    return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($info, $generator::TYPE_CODE_128)) . '" >';

}

function trimArray($array){
    $newArr = [];
    foreach ($array as $key => $data) {
        $newArr[$key] = is_string($data) ? trim($data) : $data;

    }
    return $newArr;
}


function hasPermission($permissionType){
    $permissionArr = [
        'is_read' => false,
        'is_write' => false,
        'is_create' => false,
    ];

    $user = auth()->user();
    if($user->isSuperAdmin()){
        $permissionArr = [
            'is_read' => true,
            'is_write' => true,
            'is_create' => true,
        ];
        return $permissionArr;

    }
    
    $permission = Permission::where(['type'=>$permissionType])->first();
    if(empty($permission))
        return $permissionArr;

    $rolePermission = RolePermission::where(['permission_id'=>$permission->id,'role_id'=>$user->role])->first();   

    if(!empty($rolePermission)){
        if($rolePermission->is_writable)
            $permissionArr['is_write'] =  true;

        if($rolePermission->is_readable)
            $permissionArr['is_read'] =  true;

        if($rolePermission->is_creatable)
            $permissionArr['is_create'] =  true;
    }

    return $permissionArr;
    
}


function saveUploadedFile($file, $folder = "images")
{
    $fileName = rand() . '_' . time() . '.' . $file->getClientOriginalExtension();
    Storage::disk($folder)->putFileAs('/', $file, $fileName);
    return Storage::disk($folder)->url($fileName);
}


if (! function_exists('returnNotFoundResponse')) {

    function returnNotFoundResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 404,
            'status' => 'not found',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr, 404);
    }
}

if (! function_exists('returnValidationErrorResponse')) {

    function returnValidationErrorResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 422,
            'status' => 'vaidation error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr, 422);
    }
}

if (! function_exists('returnSuccessResponse')) {

    function returnSuccessResponse($message = '', $data = array(), $is_array = false)
    {
        $is_array = !empty($is_array)?[]:(object)[];
        $returnArr = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => $message,
            'data' => ($data) ? ($data) : $is_array
        ];
        return response()->json($returnArr, 200);
    }
}

if (! function_exists('returnErrorResponse')) {

    function returnErrorResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 500,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr, 500);
    }
}

if (! function_exists('returnCustomErrorResponse')) {

    function returnCustomErrorResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 404,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr, 200);
    }
}

if (! function_exists('returnError301Response')) {

    function returnError301Response($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 301,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr, 301);
    }
}

if (! function_exists('notAuthorizedResponse')) {

    function notAuthorizedResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 401,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr);
    }
}

if (! function_exists('forbiddenResponse')) {

    function forbiddenResponse($message = '', $data = array())
    {
        $returnArr = [
            'statusCode' => 403,
            'status' => 'error',
            'message' => $message,
            'data' => ($data) ? ($data) : ((object) $data)
        ];
        return response()->json($returnArr, 403);
    }
}

if (! function_exists('getCities')) {
    function getCities() {
        $citiesArr = \App\Models\City::getCitiesDropdownArr();
        return $citiesArr;
    }
}

if (! function_exists('getStates')) {
    function getStates() {
        $statesArr = \App\Models\State::getStatesDropdownArr();
        return $statesArr;
    }
}

if (! function_exists('getCountries')) {
    function getCountries() {
        $countriesArr = \App\Models\Country::getCountriesDropdownArr();
        return $countriesArr;
    }
}

if (! function_exists('frontendDateTimeFormat')) {
    function frontendDateTimeFormat($date = '', $format = 'Y-m-d H:i A', $timeZone = '') {
        if($date){
            $timeZone = ($timeZone) ? ($timeZone) : (env('APP_TIMEZONE'));
            if($timeZone){
                return Carbon::parse($date)->timeZone($timeZone)->format($format);
            }
            return Carbon::parse($date)->format($format);
        }
        return $date;
    }
}

if (! function_exists('isValidDate')) {
    function isValidDate($date = "null") {
        try {
            \Carbon\Carbon::parse($date);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

//helper functions

function sales_city($value,$column){
    Log::info("function => sales_city $column");
    return $value;
}

function sales_state($value,$column){
    Log::info("function => sales_state $column");
    return $value;
}

function sales_zipcode($value,$column){
    Log::info("function => sales_zipcode $column");
    return $value;
}

function sales_market($value,$column){
    Log::info("function => sales_market $column");
    return $value;
}

function door_sku($value,$column){
    Log::info("function => door_sku $column");
    return $value;
}

function door_category($value,$column){
    Log::info("function => door_category $column");
    return $value;
}

function door_subcategory($value,$column){
    Log::info("function => door_subcategory $column");
    return $value;
}

function door_brand($value,$column){
    Log::info("function => door_brand $column");
    return $value;
}

function price($value,$column){
    Log::info("function => price $column");
    return $value;
}

function model($value,$column){
    Log::info("function => model $column");
    return $value;
}

function door_url($value,$column){
    Log::info("function => door_url $column");
    return $value;
}

function door_description($value,$column){
    Log::info("function => door_description $column");
    return $value;
}

function door_size_common($value,$column){
    Log::info("function => door_size_common $column");
    return $value;
}

function door_weight_lbs($value,$column){
    Log::info("function => door_weight_lbs $column");
    return $value;
}

function door_width_common($value,$column){
    Log::info("function => door_width_common $column");
    return 99.9;
}

function door_prop_65($value,$column){
    Log::info("function => door_prop_65 $column");
    return $value;
}

function door_height_common($value,$column){
    Log::info("function => door_height_common $column");
    return 50;
}

function door_color_finish($value,$column){
    Log::info("function => door_color_finish $column");
    return $value;
}

function door_height($value,$column){
    Log::info("function => door_height $column");
    return $value;
}

function series_name($value,$column){
    Log::info("function => series_name $column");
    return $value;
}

function door_type($value,$column){
    Log::info("function => door_type $column");
    return $value;
}

function door_action($value,$column){
    Log::info("function => door_action $column");
    return $value;
}

function door_depth_common($value,$column){
    Log::info("function => door_depth_common $column");
    return $value;
}

function door_glass_strength($value,$column){
    Log::info("function => door_glass_strength $column");
    return $value;
}

function door_material($value,$column){
    Log::info("function => door_material $column");
    return $value;
}

function door_energy_zone_southcentral($value,$column){
    Log::info("function => door_energy_zone_southcentral $column");
    return $value;
}

function door_energy_zone_northcentral($value,$column){
    Log::info("function => door_energy_zone_northcentral $column");
    return $value;
}

function door_compatible_mobile_home($value,$column){
    Log::info("function => door_compatible_mobile_home $column");
    return $value;
}

function door_jamb_depth($value,$column){
    Log::info("function => door_jamb_depth $column");
    return $value;
}

function door_jamb_measurement($value,$column){
    Log::info("function => door_jamb_measurement $column");
    return $value;
}

function door_color_finish_family($value,$column){
    Log::info("function => door_color_finish_family $column");
    return $value;
}

function door_hardware_incld($value,$column){
    Log::info("function => door_hardware_incld $column");
    return $value;
}

function door_color_finish_interior($value,$column){
    Log::info("function => door_color_finish_interior $column");
    return $value;
}

function door_energy_zone_south($value,$column){
    Log::info("function => door_energy_zone_south $column");
    return $value;
}

function door_rough_opening_width($value,$column){
    Log::info("function => door_rough_opening_width $column");
    return $value;
}

function door_rough_opening_height($value,$column){
    Log::info("function => door_rough_opening_height $column");
    return $value;
}

function door_screen_incld($value,$column){
    Log::info("function => door_screen_incld $column");
    return $value;
}

function door_color_finish_exterior($value,$column){
    Log::info("function => door_color_finish_exterior $column");
    return $value;
}

function door_uval($value,$column){
    Log::info("function => door_uval $column");
    return $value;
}

function door_depth($value,$column){
    Log::info("function => door_depth $column");
    return $value;
}

function door_warrenty($value,$column){
    Log::info("function => door_warrenty $column");
    return $value;
}

function door_width($value,$column){
    Log::info("function => door_width $column");
    return $value;
}

function door_glass_insulation($value,$column){
    Log::info("function => door_glass_insulation $column");
    return $value;
}

function door_unspsc($value,$column){
    Log::info("function => door_unspsc $column");
    return $value;
}

function door_glass_tint($value,$column){
    Log::info("function => door_glass_tint $column");
    return $value;
}
function door_energy_zone_north($value,$column) {
    Log::info("function => door_energy_zone_north $column");
    return $value;
}

function door_shgc($value,$column) {
    Log::info("function => door_shgc $column");
    return $value;
}

function door_brand_exclusive($value,$column) {
    Log::info("function => door_brand_exclusive $column");
    return $value;
}

function door_hinge_location($value,$column) {
    Log::info("function => door_hinge_location $column");
    return $value;
}

function door_configuration($value,$column) {
    Log::info("function => door_configuration $column");
    return $value;
}

function door_swing($value,$column) {
    Log::info("function => door_swing $column");
    return $value;
}

function door_wood_species($value,$column) {
    Log::info("function => door_wood_species $column");
    return $value;
}

function door_collection($value,$column) {
    Log::info("function => door_collection $column");
    return $value;
}

function door_finish_rough_height($value,$column) {
    Log::info("function => door_finish_rough_height $column");
    return $value;
}

function door_fire_rated($value,$column) {
    Log::info("function => door_fire_rated $column");
    return $value;
}

function door_casing_incld($value,$column) {
    Log::info("function => door_casing_incld $column");
    return $value;
}

function door_prehung($value,$column) {
    Log::info("function => door_prehung $column");
    return 1;
}

function door_jamb_width($value,$column) {
    Log::info("function => door_jamb_width $column");
    return $value;
}

function door_finish($value,$column) {
    Log::info("function => door_finish $column");
    return $value;
}

function door_handling($value,$column) {
    Log::info("function => door_handling $column");
    return $value;
}

function door_glass_style($value,$column) {
    Log::info("function => door_glass_style $column");
    return $value;
}

function door_casing_profile($value,$column) {
    Log::info("function => door_casing_profile $column");
    return $value;
}

function door_panel_frame_finish($value,$column) {
    Log::info("function => door_panel_frame_finish $column");
    return $value;
}

function door_glass_shape($value,$column) {
    Log::info("function => door_glass_shape $column");
    return $value;
}

function door_jamb_type($value,$column) {
    Log::info("function => door_jamb_type $column");
    return $value;
}

function door_core($value,$column) {
    Log::info("function => door_core $column");
    return $value;
}

function door_slab($value,$column) {
    Log::info("function => door_slab $column");
    return $value;
}

function door_cut_to_fit($value,$column) {
    Log::info("function => door_cut_to_fit $column");
    return $value;
}

function door_surface($value,$column) {
    Log::info("function => door_surface $column");
    return $value;
}

function door_hinge_finish($value,$column) {
    Log::info("function => door_hinge_finish $column");
    return $value;
}

function door_finish_rough_width($value,$column) {
    Log::info("function => door_finish_rough_width $column");
    return $value;
}

function door_thickness($value,$column) {
    Log::info("function => door_thickness $column");
    return $value;
}

function door_fire_rating($value,$column) {
    Log::info("function => door_fire_rating $column");
    return $value;
}

function door_lockset_bore($value,$column) {
    Log::info("function => door_lockset_bore $column");
    return $value;
}

function door_panel_type($value,$column) {
    Log::info("function => door_panel_type $column");
    return $value;
}

function door_hinge_incld($value,$column) {
    Log::info("function => door_hinge_incld $column");
    return $value;
}

function door_hardware_finish($value,$column) {
    Log::info("function => door_hardware_finish $column");
    return $value;
}

function door_sill_type($value,$column) {
    Log::info("function => door_sill_type $column");
    return $value;
}

function door_handle_incld($value,$column) {
    Log::info("function => door_handle_incld $column");
    return $value;
}

function door_3pt_lck($value,$column) {
    Log::info("function => door_3pt_lck $column");
    return $value;
}

function door_glass_caming($value,$column) {
    Log::info("function => door_glass_caming $column");
    return $value;
}

function door_impact_resist_glass($value,$column) {
    Log::info("function => door_impact_resist_glass $column");
    return $value;
}

function door_privacy_rating($value,$column) {
    Log::info("function => door_privacy_rating $column");
    return $value;
}

function door_caming_finish($value,$column) {
    Log::info("function => door_caming_finish $column");
    return $value;
}

function door_width_sidelights($value,$column) {
    Log::info("function => door_width_sidelights $column");
    return $value;
}

function door_handle_finish($value,$column) {
    Log::info("function => door_handle_finish $column");
    return $value;
}

function door_locking_incld($value,$column) {
    Log::info("function => door_locking_incld $column");
    return $value;
}

function door_weatherstrip_incld($value,$column) {
    Log::info("function => door_weatherstrip_incld $column");
    return $value;
}

function door_threshold_material($value,$column) {
    Log::info("function => door_threshold_material $column");
    return $value;
}

function door_commercial_residential($value,$column) {
    Log::info("function => door_commercial_residential $column");
    return $value;
}

function door_brickmould_incld($value,$column) {
    Log::info("function => door_brickmould_incld $column");
    return $value;
}

function door_sill_finish($value,$column) {
    Log::info("function => door_sill_finish $column");
    return $value;
}

function door_impact_resist($value,$column) {
    Log::info("function => door_impact_resist $column");
    return $value;
}

function door_pet_incld($value,$column) {
    Log::info("function => door_pet_incld $column");
    return $value;
}

function door_nthreshold_inside_measure($value,$column) {
    Log::info("function => door_nthreshold_inside_measure $column");
    return $value;
}

function door_threshold_type($value,$column) {
    Log::info("function => door_threshold_type $column");
    return $value;
}

function door_nthreshold_outside_measure($value,$column) {
    Log::info("function => door_nthreshold_outside_measure $column");
    return $value;
}



function set_door_style($value, $column, $row_num) {

    $normalized_value = strtolower($value);
    $door_styles = [
        'ACZ' => 'Traditional',
        'ADC' => 'Victorian',
        'ADD' => 'Farmhouse',
        'ADJ' => 'Coastal',
        'ADR' => 'Rustic',
        'AEA' => 'Craftsman',
        'AED' => 'Contemporary',
        'AEJ' => 'Mid Century',
        'AEM' => 'Modern',
    ];

    if ($normalized_value === 'yes' || $normalized_value === 'true' || $normalized_value === '1') {
        // Return the corresponding door style if the column matches one in the mapping
        if (isset($door_styles[$column])) {
            return $door_styles[$column];
        }
    }
    // If no match is found or value is not true, return null
    return null;
}

function set_door_energy_type($value, $column, $row_num) {

    $normalized_value = strtolower($value);
    $door_energy_type = [
        'BV' => 'South/Central',
        'BW' => 'North/Central',
        'DF' => 'South',
        'FT' => 'North',
    ];

    if ($normalized_value === 'yes' || $normalized_value === 'true' || $normalized_value === '1') {
        // Return the corresponding door style if the column matches one in the mapping
        if (isset($door_energy_type[$column])) {
            return $door_energy_type[$column];
        }
    }
    // If no match is found or value is not true, return null
    return null;
}