<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;
use App\Utils\InstallUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::beginTransaction();

        $password = Hash::make('password');

        $today = \Carbon::now()->format('Y-m-d H:i:s');
        $yesterday = \Carbon::now()->subDays(2)->format('Y-m-d H:i:s');
        $last_week = \Carbon::now()->subDays(7)->format('Y-m-d H:i:s');
        $last_15th_day = \Carbon::now()->subDays(15)->format('Y-m-d H:i:s');
        $last_month = \Carbon::now()->subDays(30)->format('Y-m-d H:i:s');

        $next_6_month = \Carbon::now()->addMonths(6)->format('Y-m-d');
        $next_12_month = \Carbon::now()->addMonths(12)->format('Y-m-d');
        $next_18_month = \Carbon::now()->addMonths(18)->format('Y-m-d');

        $start_of_week = \Carbon::now()->startOfWeek()->format('Y-m-d');
        $end_of_week = \Carbon::now()->endOfWeek()->format('Y-m-d');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $shortcuts = '{"pos":{"express_checkout":"shift+e","pay_n_ckeckout":"shift+p","draft":"shift+d","cancel":"shift+c","edit_discount":"shift+i","edit_order_tax":"shift+t","add_payment_row":"shift+r","finalize_payment":"shift+f","recent_product_quantity":"f2","add_new_product":"f4"}}';

        $prefixes = '{"purchase":"PO","stock_transfer":"ST","stock_adjustment":"SA","sell_return":"CN","expense":"EP","contacts":"CO","purchase_payment":"PP","sell_payment":"SP","business_location":"BL"}';

        $business = [
            ['id' => '1', 'name' => 'FOX POS', 'currency_id' => '53', 'start_date' => '2018-01-01', 'tax_number_1' => '3412569900', 'tax_label_1' => 'GSTIN', 'tax_number_2' => null, 'tax_label_2' => null, 'default_sales_tax' => null, 'default_profit_percent' => '25.00', 'owner_id' => '1', 'time_zone' => 'Asia/Kolkata', 'fy_start_month' => '1', 'accounting_method' => 'fifo', 'default_sales_discount' => '10.00', 'sell_price_tax' => 'includes', 'logo' => null, 'sku_prefix' => 'AS', 'enable_product_expiry' => '0', 'expiry_type' => 'add_expiry', 'on_product_expiry' => 'keep_selling', 'stop_selling_before' => '0', 'enable_tooltip' => '1', 'purchase_in_diff_currency' => '0', 'purchase_currency_id' => null, 'p_exchange_rate' => '1.000', 'transaction_edit_days' => '30', 'stock_expiry_alert_days' => '30', 'keyboard_shortcuts' => $shortcuts, 'pos_settings' => null, 'enable_brand' => '1', 'enable_category' => '1', 'enable_sub_category' => '1', 'enable_price_tax' => '1', 'enable_purchase_status' => '1', 'enable_lot_number' => '0', 'default_unit' => null, 'enable_racks' => '0', 'enable_row' => '0', 'enable_position' => '0', 'enable_editing_product_from_purchase' => '1', 'sales_cmsn_agnt' => null, 'item_addition_method' => '1', 'enable_inline_tax' => '1', 'currency_symbol_placement' => 'before', 'enabled_modules' => '["purchases","add_sale","pos_sale","stock_transfers","stock_adjustment","expenses","account"]', 'date_format' => 'm/d/Y', 'time_format' => '24', 'ref_no_prefixes' => $prefixes, 'created_at' => '2024-01-04 02:15:19', 'updated_at' => '2024-01-04 02:17:08', 'email_settings'=> '{"mail_driver":"smtp","mail_host":null,"mail_port":null,"mail_username":null,"mail_password":null,"mail_encryption":null,"mail_from_address":null,"mail_from_name":null}','sms_settings'=> '{"sms_service":"other","nexmo_key":null,"nexmo_secret":null,"nexmo_from":null,"twilio_sid":null,"twilio_token":null,"twilio_from":null,"url":null,"send_to_param_name":"to","msg_param_name":"text","request_method":"post","header_1":null,"header_val_1":null,"header_2":null,"header_val_2":null,"header_3":null,"header_val_3":null,"param_1":null,"param_val_1":null,"param_2":null,"param_val_2":null,"param_3":null,"param_val_3":null,"param_4":null,"param_val_4":null,"param_5":null,"param_val_5":null,"param_6":null,"param_val_6":null,"param_7":null,"param_val_7":null,"param_8":null,"param_val_8":null,"param_9":null,"param_val_9":null,"param_10":null,"param_val_10":null}','custom_labels'=>'{"payments":{"custom_pay_1":"UPI","custom_pay_2":null,"custom_pay_3":null,"custom_pay_4":null,"custom_pay_5":null,"custom_pay_6":null,"custom_pay_7":null},"contact":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null,"custom_field_5":null,"custom_field_6":null,"custom_field_7":null,"custom_field_8":null,"custom_field_9":null,"custom_field_10":null},"product":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null,"custom_field_5":null,"custom_field_6":null,"custom_field_7":null,"custom_field_8":null,"custom_field_9":null,"custom_field_10":null,"custom_field_11":null,"custom_field_12":null,"custom_field_13":null,"custom_field_14":null,"custom_field_15":null,"custom_field_16":null,"custom_field_17":null,"custom_field_18":null,"custom_field_19":null,"custom_field_20":null},"product_cf_details":{"1":{"type":null,"dropdown_options":null},"2":{"type":null,"dropdown_options":null},"3":{"type":null,"dropdown_options":null},"4":{"type":null,"dropdown_options":null},"5":{"type":null,"dropdown_options":null},"6":{"type":null,"dropdown_options":null},"7":{"type":null,"dropdown_options":null},"8":{"type":null,"dropdown_options":null},"9":{"type":null,"dropdown_options":null},"10":{"type":null,"dropdown_options":null},"11":{"type":null,"dropdown_options":null},"12":{"type":null,"dropdown_options":null},"13":{"type":null,"dropdown_options":null},"14":{"type":null,"dropdown_options":null},"15":{"type":null,"dropdown_options":null},"16":{"type":null,"dropdown_options":null},"17":{"type":null,"dropdown_options":null},"18":{"type":null,"dropdown_options":null},"19":{"type":null,"dropdown_options":null},"20":{"type":null,"dropdown_options":null}},"location":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null},"user":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null},"purchase":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null},"purchase_shipping":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null,"custom_field_5":null},"sell":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null},"shipping":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null,"custom_field_5":null},"types_of_service":{"custom_field_1":null,"custom_field_2":null,"custom_field_3":null,"custom_field_4":null,"custom_field_5":null,"custom_field_6":null}}' ,'common_settings' => '{"default_credit_limit":"20","default_datatable_page_entries":"25"}'],
        ];
        DB::table('business')->insert($business);

        $business_locations = [
            ['id' => '1', 'business_id' => '1', 'location_id' => null, 'name' => 'FOX Shop', 'landmark' => 'Guwahati', 'country' => 'IND', 'state' => 'Assam', 'city' => 'Guwahati', 'zip_code' => '781001', 'invoice_scheme_id' => '1', 'invoice_layout_id' => '1', 'sale_invoice_layout_id' => '1', 'selling_price_group_id' => null, 'print_receipt_on_invoice' => '1', 'receipt_printer_type' => 'browser', 'printer_id' => null, 'mobile' => null, 'alternate_number' => null, 'email' => null, 'website' => null, 'is_active' => '1', 'default_payment_accounts' => '{"cash":{"is_enabled":"1","account":null},"card":{"is_enabled":"1","account":null},"cheque":{"is_enabled":"1","account":null},"bank_transfer":{"is_enabled":"1","account":null},"other":{"is_enabled":"1","account":null},"custom_pay_1":{"is_enabled":"1","account":null},"custom_pay_2":{"is_enabled":"1","account":null},"custom_pay_3":{"is_enabled":"1","account":null}}', 'custom_field1' => null, 'custom_field2' => null, 'custom_field3' => null, 'custom_field4' => null, 'deleted_at' => null, 'created_at' => '2024-01-04 02:15:20', 'updated_at' => '2024-12-11 04:53:39'],
        ];

        DB::table('business_locations')->insert($business_locations);

        DB::insert("INSERT INTO users (id, surname, first_name, last_name, username, email, password, language, contact_no, address, remember_token, business_id, is_cmmsn_agnt, cmmsn_percent, deleted_at, created_at, updated_at) VALUES
        (1, 'Mr', 'Admin', NULL, 'admin', 'admin@digifox.com', '$password', 'en', NULL, NULL, '6wUbpN3xEjDDyQwCfHiGqO7JkIQgjYoDFeQMxcp09YQXq1Ih1e5EqydddBMz', 1, 0, '0.00', NULL, '2018-01-04 02:15:19', '2018-01-04 02:15:19');");


        DB::insert("INSERT INTO invoice_schemes (id, business_id, name, scheme_type, prefix, start_number, invoice_count, total_digits, is_default, created_at, updated_at) VALUES
        (1, 1, 'Default', 'blank', 'AS', 1, 5, 4, 1, '2018-01-04 02:15:20', '2018-01-04 02:45:16')");

        $invoice_layouts = [
        ['id' => '1', 'name' => 'Default', 'header_text' => null, 'invoice_no_prefix' => 'Invoice No.', 'quotation_no_prefix' => null, 'invoice_heading' => 'Invoice', 'sub_heading_line1' => null, 'sub_heading_line2' => null, 'sub_heading_line3' => null, 'sub_heading_line4' => null, 'sub_heading_line5' => null, 'invoice_heading_not_paid' => '', 'invoice_heading_paid' => '', 'quotation_heading' => null, 'sub_total_label' => 'Subtotal', 'discount_label' => 'Discount', 'tax_label' => 'Tax', 'total_label' => 'Total', 'total_due_label' => 'Total Due', 'paid_label' => 'Total Paid', 'show_client_id' => '0', 'client_id_label' => null, 'client_tax_label' => null, 'date_label' => 'Date', 'show_time' => '1', 'show_brand' => '0', 'show_sku' => '1', 'show_cat_code' => '1', 'show_sale_description' => '0', 'table_product_label' => 'Product', 'table_qty_label' => 'Quantity', 'table_unit_price_label' => 'Unit Price', 'table_subtotal_label' => 'Subtotal', 'cat_code_label' => null, 'logo' => null, 'show_logo' => '0', 'show_business_name' => '0', 'show_location_name' => '1', 'show_landmark' => '1', 'show_city' => '1', 'show_state' => '1', 'show_zip_code' => '1', 'show_country' => '1', 'show_mobile_number' => '1', 'show_alternate_number' => '0', 'show_email' => '0', 'show_tax_1' => '1', 'show_tax_2' => '0', 'show_barcode' => '0', 'show_payments' => '1', 'show_customer' => '1', 'customer_label' => 'Customer', 'highlight_color' => '#000000', 'footer_text' => '', 'module_info' => null, 'is_default' => '1', 'business_id' => '1', 'design' => 'classic', 'cn_heading' => null, 'cn_no_label' => null, 'cn_amount_label' => null, 'created_at' => '2024-04-03 23:35:32', 'updated_at' => '2024-04-03 23:35:32']
        ];
        DB::table('invoice_layouts')->insert($invoice_layouts);


        DB::insert("INSERT INTO contacts (id, business_id, type, supplier_business_name, name, contact_id, tax_number, city, state,country, mobile, landline, alternate_number, pay_term_number, pay_term_type, created_by, is_default, deleted_at, created_at, updated_at) VALUES (1, 1, 'customer', NULL, 'Walk-In Customer','CO0001', NULL, 'Guwahati', 'Assam', 'IND', '', NULL, NULL, NULL, NULL, 1, 1, NULL, '2024-01-04 02:15:20', '2024-01-04 02:35:37')");


        //Roles and permissions for business 1
        $admin_role1 = Role::create(['name' => 'Admin#1',
            'business_id' => 1,
            'guard_name' => 'web',
            'is_default' => 1,
        ]);
        $admin = User::findOrFail(1);
        $admin->assignRole('Admin#1');


        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        DB::commit();


    }
}
