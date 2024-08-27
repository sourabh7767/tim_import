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
        Schema::create('windows', function (Blueprint $table) {
            $table->id();
            $table->string('sales_city', 255)->nullable();
            $table->string('sales_state', 255)->nullable();
            $table->string('sales_zipcode', 20)->nullable();
            $table->string('sales_market', 255)->nullable();

            // Product Identifiers
            $table->string('window_sku', 50)->nullable();
            $table->string('window_category', 255)->nullable();
            $table->string('window_subcategory', 255)->nullable();
            $table->string('window_brand', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->text('window_url')->nullable();

            // Pricing
            $table->decimal('price', 10, 2)->nullable();

            // Descriptions and Series
            $table->text('window_description')->nullable();
            $table->string('series_name', 255)->nullable();

            // Dimensions
            $table->string('window_size_common', 255)->nullable();
            $table->decimal('window_height_common', 10, 2)->nullable();
            $table->decimal('window_width_common', 10, 2)->nullable();
            $table->decimal('window_depth_common', 10, 2)->nullable();
            $table->decimal('window_height', 10, 2)->nullable();
            $table->decimal('window_width', 10, 2)->nullable();
            $table->decimal('window_depth', 10, 2)->nullable();
            $table->decimal('window_wall_depth', 10, 2)->nullable();
            $table->string('window_wall_depth_measurement', 255)->nullable();
            $table->string('window_clear_opening', 255)->nullable();
            $table->decimal('window_clear_opening_width', 10, 2)->nullable();
            $table->decimal('window_clear_opening_height', 10, 2)->nullable();
            $table->decimal('window_clear_opening_sf', 10, 2)->nullable();
            $table->string('window_overfit_flange_size', 255)->nullable();
            $table->decimal('window_rough_opening_width', 10, 2)->nullable();
            $table->decimal('window_rough_opening_height', 10, 2)->nullable();
            $table->string('window_rough_opening_size', 255)->nullable();
            $table->decimal('window_project_depth', 10, 2)->nullable();
            $table->string('window_project_depth_measurement', 255)->nullable();
            $table->decimal('window_leg_height', 10, 2)->nullable();
            $table->decimal('window_uval', 10, 2)->nullable();
            $table->decimal('window_shgc', 10, 2)->nullable();
            $table->decimal('window_rval_max', 10, 2)->nullable();

            // Material and Finish
            $table->string('window_material', 255)->nullable();
            $table->string('window_color_finish', 255)->nullable();
            $table->string('window_color_finish_family', 255)->nullable();
            $table->string('window_color_finish_interior', 255)->nullable();
            $table->string('window_color_finish_exterior', 255)->nullable();
            $table->string('window_panel_frame_finish', 255)->nullable();
            $table->string('window_glass_strength', 255)->nullable();
            $table->string('window_glass_style', 255)->nullable();
            $table->string('window_glass_shape', 255)->nullable();
            $table->string('window_glass_tint', 255)->nullable();
            $table->string('window_glass_caming', 255)->nullable();
            $table->string('window_caming_finish', 255)->nullable();
            $table->string('window_wood_jamb_extend', 255)->nullable();
            $table->decimal('window_jamb_depth', 10, 2)->nullable();
            $table->string('window_jamb_measurement', 255)->nullable();
            $table->string('window_jamb_type', 255)->nullable();
            $table->string('window_sash_configure', 255)->nullable();
            $table->string('window_sash_operation', 255)->nullable();
            $table->string('window_hinge_finish', 255)->nullable();
            $table->string('window_handle_finish', 255)->nullable();
            $table->string('window_hardware_finish', 255)->nullable();
            $table->string('window_sill_type', 255)->nullable();
            $table->boolean('window_handle_incld')->nullable();
            $table->boolean('window_locking_incld')->nullable();
            $table->boolean('window_weatherstrip_incld')->nullable();
            $table->string('window_glass_insulation', 255)->nullable();
            $table->string('window_lock_type', 255)->nullable();
            $table->string('window_hardware_color_finish', 255)->nullable();
            $table->boolean('window_lockable_vent')->nullable();
            $table->string('window_screen_frame_type', 255)->nullable();
            $table->boolean('window_nail_fin')->nullable();
            $table->string('window_frame_material', 255)->nullable();
            $table->string('window_frame_profile', 255)->nullable();
            $table->boolean('window_mount_hardware_incld')->nullable();

            // Energy Efficiency
            $table->string('window_energy_zone', 255)->nullable();
            $table->boolean('window_meets_title_24')->nullable();
            $table->decimal('window_solar_heat_gain_coefficient', 10, 2)->nullable();
            $table->boolean('window_impact_resistant')->nullable();
            $table->boolean('window_miami_dade_approved')->nullable();
            $table->boolean('window_florida_approved')->nullable();
            $table->boolean('window_texas_insurance_approved')->nullable();
            $table->boolean('window_hurricane_approved')->nullable();
            $table->decimal('window_sound_transmission_control', 10, 2)->nullable();

            // Features
            $table->text('window_action')->nullable();
            $table->boolean('window_screen_incld')->nullable();
            $table->string('window_screen_type', 255)->nullable();
            $table->boolean('window_vent_screen_incld')->nullable();
            $table->boolean('window_vent_latch')->nullable();
            $table->string('window_vent_type', 255)->nullable();
            $table->boolean('window_vented')->nullable();
            $table->string('window_design', 255)->nullable();
            $table->string('window_design_addl', 255)->nullable();
            $table->string('window_balance_system', 255)->nullable();
            $table->boolean('window_high_altitude')->nullable();
            $table->string('window_install_type', 255)->nullable();
            $table->boolean('window_insect_screen_incld')->nullable();
            $table->boolean('window_plant_shelf_incld')->nullable();
            $table->boolean('window_grid_incld')->nullable();
            $table->string('window_grid_profile', 255)->nullable();
            $table->string('window_grid_type', 255)->nullable();
            $table->string('window_grid_pattern', 255)->nullable();
            $table->decimal('window_grid_width', 10, 2)->nullable();
            $table->boolean('window_ca_forced_entry_req')->nullable();
            $table->boolean('window_meets_wildlife_urban')->nullable();
            $table->boolean('window_obscure_glass')->nullable();
            $table->string('window_tilt_mechanism', 255)->nullable();
            $table->boolean('window_is_paintable')->nullable();
            $table->boolean('window_tilting')->nullable();
            $table->boolean('window_lock_vent')->nullable();
            $table->decimal('window_voc_lvl', 10, 2)->nullable();
            $table->string('window_project_type', 255)->nullable();

            // Compliance and Certifications
            $table->boolean('window_compatible_mobile_home')->nullable();
            $table->string('window_unspsc', 50)->nullable();
            $table->text('window_warrenty')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('windows');
    }
};
