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
        Schema::create('appliances', function (Blueprint $table) {
            $table->id();
            $table->string('sales_city', 255)->nullable();
            $table->string('sales_state', 255)->nullable();
            $table->string('sales_zipcode', 255)->nullable();
            $table->string('sales_market', 255)->nullable();

            // Product Identification
            $table->string('appliance_sku', 255)->nullable();
            $table->string('appliance_category', 255)->nullable();
            $table->string('appliance_subcategory', 255)->nullable();
            $table->string('appliance_brand', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('appliance_url', 255)->nullable();
            $table->string('appliance_description', 255)->nullable();

            // Physical Measurements
            $table->float('appliance_weight')->nullable();
            $table->float('appliance_common_width')->nullable();
            $table->float('appliance_width')->nullable();
            $table->float('appliance_actual_height')->nullable();
            $table->float('appliance_actual_depth')->nullable();
            $table->float('appliance_actual_width')->nullable();
            $table->float('appliance_capacity')->nullable();
            $table->float('appliance_refrigerator_cap')->nullable();

            // Power and Performance
            $table->string('appliance_power_source', 255)->nullable();
            $table->float('appliance_max_watt')->nullable();

            // Features and Options
            $table->string('appliance_manufacturer_color_finish', 255)->nullable();
            $table->string('appliance_type', 255)->nullable();
            $table->string('appliance_handle_type', 255)->nullable();
            $table->string('appliance_control_type', 255)->nullable();
            $table->string('appliance_vent_type', 255)->nullable();
            $table->string('appliance_customizable', 255)->nullable();
            $table->string('appliance_soft_close_drawer', 255)->nullable();
            $table->string('appliance_filter_ice', 255)->nullable();
            $table->string('appliance_cabinet_color', 255)->nullable();
            $table->string('appliance_water_filter_indicator', 255)->nullable();
            $table->integer('appliance_door_cnt')->nullable();
            $table->string('appliance_door_gallon_storage', 255)->nullable();
            $table->string('appliance_interior_light', 255)->nullable();
            $table->string('appliance_stemware', 255)->nullable();
            $table->string('appliance_wash_system', 255)->nullable();
            $table->integer('appliance_wash_levels')->nullable();

            // Warranty and Compliance
            $table->string('appliance_warranty', 255)->nullable();
            $table->string('appliance_lowes_exclusive', 255)->nullable();
            $table->string('appliance_prop_65', 255)->nullable();
            $table->boolean('appliance_nsf_cert_sanitization')->nullable();
            $table->boolean('appliance_commercial_use')->nullable();

            // Smart Technology
            $table->boolean('appliance_app_compatible')->nullable();
            $table->boolean('appliance_smart_compatible')->nullable();
            $table->boolean('appliance_voice_ctrl')->nullable();

            // Installation Details
            $table->string('appliance_install_type', 255)->nullable();
            $table->boolean('appliance_rv_use')->nullable();
            $table->boolean('appliance_fill_hose_incld')->nullable();
            $table->boolean('appliance_drain_hose_incld')->nullable();
            $table->boolean('appliance_custom_door_kit_compatible')->nullable();
            $table->boolean('appliance_install_over_wall')->nullable();

            // Additional Features
            $table->integer('appliance_freezer_shelf')->nullable();
            $table->integer('appliance_freezer_basket')->nullable();
            $table->boolean('appliance_ice_maker')->nullable();
            $table->boolean('appliance_meat_probe')->nullable();
            $table->boolean('appliance_timer')->nullable();
            $table->boolean('appliance_steam_bake')->nullable();
            $table->boolean('appliance_steam_roast')->nullable();
            $table->float('appliance_sound_level')->nullable();
            $table->boolean('appliance_sensor_wash_cycle')->nullable();
            $table->boolean('appliance_quick_rinse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appliances');
    }
};
