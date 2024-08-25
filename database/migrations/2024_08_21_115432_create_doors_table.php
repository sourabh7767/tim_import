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
        Schema::create('doors', function (Blueprint $table) {
            $table->id();
            $table->string('sales_city', 255)->nullable();
            $table->string('sales_state', 255)->nullable();
            $table->string('sales_zipcode', 20)->nullable();
            $table->string('sales_market', 255)->nullable();

            // Product Identifiers
            $table->string('door_sku', 50)->nullable();
            $table->string('model', 255)->nullable();
            $table->text('door_url')->nullable();

            // Product Categories and Subcategories
            $table->string('door_category', 255)->nullable();
            $table->string('door_subcategory', 255)->nullable();
            $table->string('door_brand', 255)->nullable();
            $table->string('door_collection', 255)->nullable();
            $table->boolean('door_brand_exclusive')->default(false);

            // Pricing
            $table->decimal('price', 10, 2)->nullable();

            // Descriptions and Series
            $table->text('door_description')->nullable();
            $table->string('series_name', 255)->nullable();
            
            // Dimensions
            $table->string('door_size_common', 255)->nullable();
            $table->decimal('door_height_common', 10, 2)->nullable();
            $table->decimal('door_width_common', 10, 2)->nullable();
            $table->decimal('door_depth_common', 10, 2)->nullable();
            $table->decimal('door_height', 10, 2)->nullable();
            $table->decimal('door_width', 10, 2)->nullable();
            $table->decimal('door_depth', 10, 2)->nullable();
            $table->decimal('door_weight_lbs', 10, 2)->nullable();
            $table->decimal('door_finish_rough_height', 10, 2)->nullable();
            $table->decimal('door_finish_rough_width', 10, 2)->nullable();
            $table->decimal('door_rough_opening_width', 10, 2)->nullable();
            $table->decimal('door_rough_opening_height', 10, 2)->nullable();
            $table->decimal('door_width_sidelights', 10, 2)->nullable();
            $table->decimal('door_threshold_inside_measure', 10, 2)->nullable();
            $table->decimal('door_threshold_outside_measure', 10, 2)->nullable();
            $table->decimal('door_thickness', 10, 2)->nullable();

            // Material and Finish
            $table->string('door_material', 255)->nullable();
            $table->string('door_color_finish', 255)->nullable();
            $table->string('door_color_finish_family', 255)->nullable();
            $table->string('door_color_finish_interior', 255)->nullable();
            $table->string('door_color_finish_exterior', 255)->nullable();
            $table->string('door_panel_frame_finish', 255)->nullable();
            $table->string('door_finish', 255)->nullable();
            $table->string('door_surface', 255)->nullable();
            $table->string('door_sill_finish', 255)->nullable();
            $table->string('door_hinge_finish', 255)->nullable();
            $table->string('door_handle_finish', 255)->nullable();
            $table->string('door_hardware_finish', 255)->nullable();
            $table->string('door_casing_profile', 255)->nullable();
            $table->string('door_panel_type', 255)->nullable();
            $table->string('door_glass_strength', 255)->nullable();
            $table->string('door_glass_style', 255)->nullable();
            $table->string('door_glass_shape', 255)->nullable();
            $table->string('door_glass_tint', 255)->nullable();
            $table->string('door_glass_caming', 255)->nullable();
            $table->string('door_caming_finish', 255)->nullable();

            // Style and Configuration
            $table->string('door_style', 255)->nullable();
            $table->string('door_type', 255)->nullable();
            $table->string('door_configuration', 255)->nullable();
            $table->string('door_swing', 255)->nullable();
            $table->string('door_wood_species', 255)->nullable();
            $table->string('door_core', 255)->nullable();

            // Features
            $table->text('door_action')->nullable();
            $table->boolean('door_screen_incld')->default(false);
            $table->boolean('door_hardware_incld')->default(false);
            $table->boolean('door_prehung')->default(false);
            $table->boolean('door_slab')->default(false);
            $table->boolean('door_cut_to_fit')->default(false);
            $table->decimal('door_jamb_depth', 10, 2)->nullable();
            $table->string('door_jamb_measurement', 255)->nullable();
            $table->decimal('door_jamb_width', 10, 2)->nullable();
            $table->string('door_jamb_type', 255)->nullable();
            $table->string('door_handling', 255)->nullable();
            $table->boolean('door_casing_incld')->default(false);
            $table->string('door_lockset_bore', 255)->nullable();
            $table->string('door_hinge_location', 255)->nullable();
            $table->string('door_sill_type', 255)->nullable();
            $table->boolean('door_handle_incld')->default(false);
            $table->boolean('door_locking_incld')->default(false);
            $table->boolean('door_weatherstrip_incld')->default(false);
            $table->boolean('door_3pt_lck')->default(false);
            $table->boolean('door_fire_rated')->default(false);
            $table->string('door_fire_rating', 255)->nullable();
            $table->boolean('door_impact_resist_glass')->default(false);
            $table->boolean('door_impact_resist')->default(false);
            $table->decimal('door_privacy_rating', 10, 2)->nullable();
            $table->string('door_commercial_residential', 255)->nullable();
            $table->boolean('door_brickmould_incld')->default(false);
            $table->boolean('door_pet_incld')->default(false);
            $table->string('door_threshold_material', 255)->nullable();
            $table->string('door_threshold_type', 255)->nullable();

            // Energy Efficiency
            $table->string('door_energy_zone', 255)->nullable();
            $table->decimal('door_uval', 10, 2)->nullable();
            $table->decimal('door_shgc', 10, 2)->nullable();
            $table->text('door_prop_65')->nullable();

            // Compliance and Certifications
            $table->boolean('door_compatible_mobile_home')->default(false);
            $table->string('door_unspsc', 50)->nullable();
            $table->text('door_warrenty')->nullable();


            // $table->id();
            // $table->string('sales_city', 255)->nullable();
            // $table->string('sales_state', 255)->nullable();
            // $table->string('sales_zipcode', 20)->nullable();
            // $table->string('sales_market', 255)->nullable();

            // // Product Identifiers
            // $table->string('door_sku', 50)->nullable();
            // $table->string('model', 255)->nullable();
            // $table->string('door_url')->nullable();

            // // Product Categories and Subcategories
            // $table->string('door_category', 255)->nullable();
            // $table->string('door_subcategory', 255)->nullable();
            // $table->string('door_brand', 255)->nullable();
            // $table->string('door_collection', 255)->nullable();
            // $table->string('door_brand_exclusive')->default('false');

            // // Pricing
            // $table->string('price')->nullable();

            // // Descriptions and Series
            // $table->string('door_description')->nullable();
            // $table->string('series_name', 255)->nullable();

            // // Dimensions
            // $table->string('door_size_common', 255)->nullable();
            // $table->string('door_height_common')->nullable();
            // $table->string('door_width_common')->nullable();
            // $table->string('door_depth_common')->nullable();
            // $table->string('door_height')->nullable();
            // $table->string('door_width')->nullable();
            // $table->string('door_depth')->nullable();
            // $table->string('door_weight_lbs')->nullable();
            // $table->string('door_finish_rough_height')->nullable();
            // $table->string('door_finish_rough_width')->nullable();
            // $table->string('door_rough_opening_width')->nullable();
            // $table->string('door_rough_opening_height')->nullable();
            // $table->string('door_width_sidelights')->nullable();
            // $table->string('door_threshold_inside_measure')->nullable();
            // $table->string('door_threshold_outside_measure')->nullable();
            // $table->string('door_thickness')->nullable();

            // // Material and Finish
            // $table->string('door_material', 255)->nullable();
            // $table->string('door_color_finish', 255)->nullable();
            // $table->string('door_color_finish_family', 255)->nullable();
            // $table->string('door_color_finish_interior', 255)->nullable();
            // $table->string('door_color_finish_exterior', 255)->nullable();
            // $table->string('door_panel_frame_finish', 255)->nullable();
            // $table->string('door_finish', 255)->nullable();
            // $table->string('door_surface', 255)->nullable();
            // $table->string('door_sill_finish', 255)->nullable();
            // $table->string('door_hinge_finish', 255)->nullable();
            // $table->string('door_handle_finish', 255)->nullable();
            // $table->string('door_hardware_finish', 255)->nullable();
            // $table->string('door_casing_profile', 255)->nullable();
            // $table->string('door_panel_type', 255)->nullable();
            // $table->string('door_glass_strength', 255)->nullable();
            // $table->string('door_glass_style', 255)->nullable();
            // $table->string('door_glass_shape', 255)->nullable();
            // $table->string('door_glass_tint', 255)->nullable();
            // $table->string('door_glass_caming', 255)->nullable();
            // $table->string('door_caming_finish', 255)->nullable();

            // // Style and Configuration
            // $table->string('door_style', 255)->nullable();
            // $table->string('door_type', 255)->nullable();
            // $table->string('door_configuration', 255)->nullable();
            // $table->string('door_swing', 255)->nullable();
            // $table->string('door_wood_species', 255)->nullable();
            // $table->string('door_core', 255)->nullable();

            // // Features
            // $table->string('door_warrenty')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doors');
    }
};
