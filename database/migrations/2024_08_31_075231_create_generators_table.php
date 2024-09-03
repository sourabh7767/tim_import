<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generators', function (Blueprint $table) {
            $table->id();
            $table->string('sales_city', 255)->nullable();
            $table->string('sales_state', 255)->nullable();
            $table->string('sales_zipcode', 255)->nullable();
            $table->string('sales_market', 255)->nullable();

            // Product Identification
            $table->string('door_sku', 255)->nullable();
            $table->string('generator_category', 255)->nullable();
            $table->string('generator_subcategory', 255)->nullable();
            $table->string('generator_brand', 255)->nullable();
            $table->string('model', 255)->nullable();

            // Online Details
            $table->string('generator_url', 255)->nullable();
            $table->string('generator_description', 255)->nullable();

            // Physical Measurements
            $table->float('generator_weight')->nullable();
            $table->float('generator_width')->nullable();
            $table->float('generator_length')->nullable();
            $table->float('generator_height')->nullable();
            $table->float('generator_depth')->nullable();

            // Material and Finish
            $table->string('generator_material', 255)->nullable();
            $table->string('generator_color_finish', 255)->nullable();
            $table->string('generator_frame_color_finish', 255)->nullable();

            // Warranty and Compliance
            $table->string('generator_warranty', 255)->nullable();
            $table->string('generator_lowes_exclusive', 255)->nullable();
            $table->string('generator_prop_65', 255)->nullable();
            $table->integer('generator_protected_circuits')->nullable();
            $table->float('generator_base_warranty_labor')->nullable();
            $table->boolean('generator_base_warranty_parts')->nullable();

            // Power and Performance
            $table->float('price')->nullable();
            $table->string('generator_power_source', 255)->nullable();
            $table->float('generator_amp_240v_diesel')->nullable();
            $table->float('generator_amp_240v_natgas')->nullable();
            $table->float('generator_amp_240v_lp')->nullable();
            $table->float('generator_watt_range_lp')->nullable();
            $table->boolean('generator_watt_range_natgas')->nullable();
            $table->float('generator_watt_rated_diesel')->nullable();
            $table->boolean('generator_running_watts')->nullable();
            $table->boolean('generator_starting_watts')->nullable();
            $table->float('generator_peak_power_watts')->nullable();
            $table->boolean('generator_transfer_switch')->nullable();
            $table->boolean('generator_transfer_switch_amp')->nullable();
            $table->boolean('generator_transfer_switch_rate')->nullable();
            $table->string('generator_auto_volt_regulator', 255)->nullable();
            $table->float('generator_harmonic_distortion')->nullable();
            $table->float('generator_fuel_lp_consumption')->nullable();
            $table->float('generator_fuel_diesel_consumption')->nullable();
            $table->boolean('generator_fuel_natgas_consumption')->nullable();
            $table->boolean('generator_fuel_capacity')->nullable();
            $table->boolean('generator_fuel_gauge')->nullable();
            $table->boolean('generator_fuel_tech')->nullable();
            $table->float('generator_normal_operating_load')->nullable();

            // Features
            $table->string('generator_use_location', 255)->nullable();
            $table->boolean('generator_allow_jobsite')->nullable();
            $table->boolean('generator_recreation_use')->nullable();
            $table->boolean('generator_tailgate_compatible')->nullable();
            $table->boolean('generator_emergency_use')->nullable();
            $table->boolean('generator_campsite_use')->nullable();
            $table->boolean('generator_wheel_kit_incld')->nullable();
            $table->boolean('generator_pwr_station')->nullable();
            $table->boolean('generator_gfci')->nullable();
            $table->boolean('generator_usb_ports')->nullable();
            $table->boolean('generator_cord_incld')->nullable();
            $table->float('generator_cord_length')->nullable();
            $table->string('generator_control_panel', 255)->nullable();
            $table->boolean('generator_overload_protect')->nullable();
            $table->boolean('generator_low_oil_shutdown')->nullable();
            $table->boolean('generator_automatic_idle_ctrl')->nullable();
            $table->boolean('generator_exercise_cycle')->nullable();
            $table->boolean('generator_start_type')->nullable();

            // Solar and Charging
            $table->string('generator_solar_panel_tech', 255)->nullable();
            $table->boolean('generator_solar_panel_power_output')->nullable();
            $table->integer('generator_solar_panel_cnt_incld')->nullable();
            $table->boolean('generator_charge_dc')->nullable();
            $table->boolean('generator_charge_ac')->nullable();
            $table->boolean('generator_charge_by_solar')->nullable();
            $table->boolean('generator_dc_anderson_powerpole_input_cnt')->nullable();
            $table->boolean('generator_dc_anderson_powerpole_output_cnt')->nullable();
            $table->integer('generator_dc_8mm_input_cnt')->nullable();

            // Engine and Performance Metrics
            $table->string('generator_engine_series', 255)->nullable();
            $table->string('generator_engine_brand', 255)->nullable();
            $table->float('generator_engine_displacement')->nullable();
            $table->string('generator_oil_type', 255)->nullable();
            $table->float('generator_oil_capacity')->nullable();
            $table->string('generator_running_watt_range', 255)->nullable();
            $table->float('generator_operation_volumn')->nullable();
            $table->float('generator_response_time')->nullable();
            $table->float('generator_noise_level')->nullable();
            $table->string('generator_tire_type', 255)->nullable();
            $table->boolean('generator_tire_diam')->nullable();
            $table->boolean('generator_hour_meter')->nullable();
            $table->string('generator_alternator_type', 255)->nullable();

            // Safety and Environmental Features
            $table->string('generator_safety_listing', 255)->nullable();
            $table->string('generator_carb_comply', 255)->nullable();
            $table->boolean('generator_carbon_monoxide_sensor')->nullable();
            $table->date('source_date')->nullable();
            $table->integer('import_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generators');
    }
};
