<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection disabeCreateButton
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection department_id
     * @property Grid\Column|Collection gender
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection ad_tag
     * @property Grid\Column|Collection extended_fields
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection money
     * @property Grid\Column|Collection category_game
     * @property Grid\Column|Collection ratio
     * @property Grid\Column|Collection check_item
     * @property Grid\Column|Collection start_time
     * @property Grid\Column|Collection end_time
     * @property Grid\Column|Collection check_id
     * @property Grid\Column|Collection item_id
     * @property Grid\Column|Collection checker
     * @property Grid\Column|Collection table_name
     * @property Grid\Column|Collection specification
     * @property Grid\Column|Collection category_id
     * @property Grid\Column|Collection vendor_id
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection consumable_id
     * @property Grid\Column|Collection purchased
     * @property Grid\Column|Collection expired
     * @property Grid\Column|Collection change
     * @property Grid\Column|Collection nick_name
     * @property Grid\Column|Collection must
     * @property Grid\Column|Collection select_options
     * @property Grid\Column|Collection rules
     * @property Grid\Column|Collection depreciation_rule_id
     * @property Grid\Column|Collection mac
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection photo
     * @property Grid\Column|Collection asset_number
     * @property Grid\Column|Collection discard_at
     * @property Grid\Column|Collection device_id
     * @property Grid\Column|Collection lend_time
     * @property Grid\Column|Collection lend_description
     * @property Grid\Column|Collection plan_return_time
     * @property Grid\Column|Collection return_time
     * @property Grid\Column|Collection return_description
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection category
     * @property Grid\Column|Collection cachchoi
     * @property Grid\Column|Collection infor_bet
     * @property Grid\Column|Collection sodoncuoc
     * @property Grid\Column|Collection capdonhan
     * @property Grid\Column|Collection luotso
     * @property Grid\Column|Collection thangthua
     * @property Grid\Column|Collection bank_id
     * @property Grid\Column|Collection bank_name
     * @property Grid\Column|Collection banker
     * @property Grid\Column|Collection log_id
     * @property Grid\Column|Collection log
     * @property Grid\Column|Collection item
     * @property Grid\Column|Collection succeed
     * @property Grid\Column|Collection failed
     * @property Grid\Column|Collection operator
     * @property Grid\Column|Collection attempts
     * @property Grid\Column|Collection reserved_at
     * @property Grid\Column|Collection available_at
     * @property Grid\Column|Collection ng_description
     * @property Grid\Column|Collection ok_description
     * @property Grid\Column|Collection ng_time
     * @property Grid\Column|Collection ok_time
     * @property Grid\Column|Collection notifiable_type
     * @property Grid\Column|Collection notifiable_id
     * @property Grid\Column|Collection data
     * @property Grid\Column|Collection read_at
     * @property Grid\Column|Collection sn
     * @property Grid\Column|Collection part_id
     * @property Grid\Column|Collection service_id
     * @property Grid\Column|Collection issue
     * @property Grid\Column|Collection start
     * @property Grid\Column|Collection end
     * @property Grid\Column|Collection distribution
     * @property Grid\Column|Collection counts
     * @property Grid\Column|Collection software_id
     * @property Grid\Column|Collection todo_id
     * @property Grid\Column|Collection origin_json_string
     * @property Grid\Column|Collection priority
     * @property Grid\Column|Collection tags
     * @property Grid\Column|Collection done_description
     * @property Grid\Column|Collection emoji
     * @property Grid\Column|Collection location
     * @property Grid\Column|Collection contacts
     *
     * @method Grid\Column|Collection disabeCreateButton(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection department_id(string $label = null)
     * @method Grid\Column|Collection gender(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection ad_tag(string $label = null)
     * @method Grid\Column|Collection extended_fields(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection money(string $label = null)
     * @method Grid\Column|Collection category_game(string $label = null)
     * @method Grid\Column|Collection ratio(string $label = null)
     * @method Grid\Column|Collection check_item(string $label = null)
     * @method Grid\Column|Collection start_time(string $label = null)
     * @method Grid\Column|Collection end_time(string $label = null)
     * @method Grid\Column|Collection check_id(string $label = null)
     * @method Grid\Column|Collection item_id(string $label = null)
     * @method Grid\Column|Collection checker(string $label = null)
     * @method Grid\Column|Collection table_name(string $label = null)
     * @method Grid\Column|Collection specification(string $label = null)
     * @method Grid\Column|Collection category_id(string $label = null)
     * @method Grid\Column|Collection vendor_id(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection consumable_id(string $label = null)
     * @method Grid\Column|Collection purchased(string $label = null)
     * @method Grid\Column|Collection expired(string $label = null)
     * @method Grid\Column|Collection change(string $label = null)
     * @method Grid\Column|Collection nick_name(string $label = null)
     * @method Grid\Column|Collection must(string $label = null)
     * @method Grid\Column|Collection select_options(string $label = null)
     * @method Grid\Column|Collection rules(string $label = null)
     * @method Grid\Column|Collection depreciation_rule_id(string $label = null)
     * @method Grid\Column|Collection mac(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection photo(string $label = null)
     * @method Grid\Column|Collection asset_number(string $label = null)
     * @method Grid\Column|Collection discard_at(string $label = null)
     * @method Grid\Column|Collection device_id(string $label = null)
     * @method Grid\Column|Collection lend_time(string $label = null)
     * @method Grid\Column|Collection lend_description(string $label = null)
     * @method Grid\Column|Collection plan_return_time(string $label = null)
     * @method Grid\Column|Collection return_time(string $label = null)
     * @method Grid\Column|Collection return_description(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection category(string $label = null)
     * @method Grid\Column|Collection cachchoi(string $label = null)
     * @method Grid\Column|Collection infor_bet(string $label = null)
     * @method Grid\Column|Collection sodoncuoc(string $label = null)
     * @method Grid\Column|Collection capdonhan(string $label = null)
     * @method Grid\Column|Collection luotso(string $label = null)
     * @method Grid\Column|Collection thangthua(string $label = null)
     * @method Grid\Column|Collection bank_id(string $label = null)
     * @method Grid\Column|Collection bank_name(string $label = null)
     * @method Grid\Column|Collection banker(string $label = null)
     * @method Grid\Column|Collection log_id(string $label = null)
     * @method Grid\Column|Collection log(string $label = null)
     * @method Grid\Column|Collection item(string $label = null)
     * @method Grid\Column|Collection succeed(string $label = null)
     * @method Grid\Column|Collection failed(string $label = null)
     * @method Grid\Column|Collection operator(string $label = null)
     * @method Grid\Column|Collection attempts(string $label = null)
     * @method Grid\Column|Collection reserved_at(string $label = null)
     * @method Grid\Column|Collection available_at(string $label = null)
     * @method Grid\Column|Collection ng_description(string $label = null)
     * @method Grid\Column|Collection ok_description(string $label = null)
     * @method Grid\Column|Collection ng_time(string $label = null)
     * @method Grid\Column|Collection ok_time(string $label = null)
     * @method Grid\Column|Collection notifiable_type(string $label = null)
     * @method Grid\Column|Collection notifiable_id(string $label = null)
     * @method Grid\Column|Collection data(string $label = null)
     * @method Grid\Column|Collection read_at(string $label = null)
     * @method Grid\Column|Collection sn(string $label = null)
     * @method Grid\Column|Collection part_id(string $label = null)
     * @method Grid\Column|Collection service_id(string $label = null)
     * @method Grid\Column|Collection issue(string $label = null)
     * @method Grid\Column|Collection start(string $label = null)
     * @method Grid\Column|Collection end(string $label = null)
     * @method Grid\Column|Collection distribution(string $label = null)
     * @method Grid\Column|Collection counts(string $label = null)
     * @method Grid\Column|Collection software_id(string $label = null)
     * @method Grid\Column|Collection todo_id(string $label = null)
     * @method Grid\Column|Collection origin_json_string(string $label = null)
     * @method Grid\Column|Collection priority(string $label = null)
     * @method Grid\Column|Collection tags(string $label = null)
     * @method Grid\Column|Collection done_description(string $label = null)
     * @method Grid\Column|Collection emoji(string $label = null)
     * @method Grid\Column|Collection location(string $label = null)
     * @method Grid\Column|Collection contacts(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection disabeCreateButton
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection department_id
     * @property Show\Field|Collection gender
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection email
     * @property Show\Field|Collection ad_tag
     * @property Show\Field|Collection extended_fields
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection status
     * @property Show\Field|Collection money
     * @property Show\Field|Collection category_game
     * @property Show\Field|Collection ratio
     * @property Show\Field|Collection check_item
     * @property Show\Field|Collection start_time
     * @property Show\Field|Collection end_time
     * @property Show\Field|Collection check_id
     * @property Show\Field|Collection item_id
     * @property Show\Field|Collection checker
     * @property Show\Field|Collection table_name
     * @property Show\Field|Collection specification
     * @property Show\Field|Collection category_id
     * @property Show\Field|Collection vendor_id
     * @property Show\Field|Collection price
     * @property Show\Field|Collection consumable_id
     * @property Show\Field|Collection purchased
     * @property Show\Field|Collection expired
     * @property Show\Field|Collection change
     * @property Show\Field|Collection nick_name
     * @property Show\Field|Collection must
     * @property Show\Field|Collection select_options
     * @property Show\Field|Collection rules
     * @property Show\Field|Collection depreciation_rule_id
     * @property Show\Field|Collection mac
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection photo
     * @property Show\Field|Collection asset_number
     * @property Show\Field|Collection discard_at
     * @property Show\Field|Collection device_id
     * @property Show\Field|Collection lend_time
     * @property Show\Field|Collection lend_description
     * @property Show\Field|Collection plan_return_time
     * @property Show\Field|Collection return_time
     * @property Show\Field|Collection return_description
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection category
     * @property Show\Field|Collection cachchoi
     * @property Show\Field|Collection infor_bet
     * @property Show\Field|Collection sodoncuoc
     * @property Show\Field|Collection capdonhan
     * @property Show\Field|Collection luotso
     * @property Show\Field|Collection thangthua
     * @property Show\Field|Collection bank_id
     * @property Show\Field|Collection bank_name
     * @property Show\Field|Collection banker
     * @property Show\Field|Collection log_id
     * @property Show\Field|Collection log
     * @property Show\Field|Collection item
     * @property Show\Field|Collection succeed
     * @property Show\Field|Collection failed
     * @property Show\Field|Collection operator
     * @property Show\Field|Collection attempts
     * @property Show\Field|Collection reserved_at
     * @property Show\Field|Collection available_at
     * @property Show\Field|Collection ng_description
     * @property Show\Field|Collection ok_description
     * @property Show\Field|Collection ng_time
     * @property Show\Field|Collection ok_time
     * @property Show\Field|Collection notifiable_type
     * @property Show\Field|Collection notifiable_id
     * @property Show\Field|Collection data
     * @property Show\Field|Collection read_at
     * @property Show\Field|Collection sn
     * @property Show\Field|Collection part_id
     * @property Show\Field|Collection service_id
     * @property Show\Field|Collection issue
     * @property Show\Field|Collection start
     * @property Show\Field|Collection end
     * @property Show\Field|Collection distribution
     * @property Show\Field|Collection counts
     * @property Show\Field|Collection software_id
     * @property Show\Field|Collection todo_id
     * @property Show\Field|Collection origin_json_string
     * @property Show\Field|Collection priority
     * @property Show\Field|Collection tags
     * @property Show\Field|Collection done_description
     * @property Show\Field|Collection emoji
     * @property Show\Field|Collection location
     * @property Show\Field|Collection contacts
     *
     * @method Show\Field|Collection disabeCreateButton(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection department_id(string $label = null)
     * @method Show\Field|Collection gender(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection ad_tag(string $label = null)
     * @method Show\Field|Collection extended_fields(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection money(string $label = null)
     * @method Show\Field|Collection category_game(string $label = null)
     * @method Show\Field|Collection ratio(string $label = null)
     * @method Show\Field|Collection check_item(string $label = null)
     * @method Show\Field|Collection start_time(string $label = null)
     * @method Show\Field|Collection end_time(string $label = null)
     * @method Show\Field|Collection check_id(string $label = null)
     * @method Show\Field|Collection item_id(string $label = null)
     * @method Show\Field|Collection checker(string $label = null)
     * @method Show\Field|Collection table_name(string $label = null)
     * @method Show\Field|Collection specification(string $label = null)
     * @method Show\Field|Collection category_id(string $label = null)
     * @method Show\Field|Collection vendor_id(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection consumable_id(string $label = null)
     * @method Show\Field|Collection purchased(string $label = null)
     * @method Show\Field|Collection expired(string $label = null)
     * @method Show\Field|Collection change(string $label = null)
     * @method Show\Field|Collection nick_name(string $label = null)
     * @method Show\Field|Collection must(string $label = null)
     * @method Show\Field|Collection select_options(string $label = null)
     * @method Show\Field|Collection rules(string $label = null)
     * @method Show\Field|Collection depreciation_rule_id(string $label = null)
     * @method Show\Field|Collection mac(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection photo(string $label = null)
     * @method Show\Field|Collection asset_number(string $label = null)
     * @method Show\Field|Collection discard_at(string $label = null)
     * @method Show\Field|Collection device_id(string $label = null)
     * @method Show\Field|Collection lend_time(string $label = null)
     * @method Show\Field|Collection lend_description(string $label = null)
     * @method Show\Field|Collection plan_return_time(string $label = null)
     * @method Show\Field|Collection return_time(string $label = null)
     * @method Show\Field|Collection return_description(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection category(string $label = null)
     * @method Show\Field|Collection cachchoi(string $label = null)
     * @method Show\Field|Collection infor_bet(string $label = null)
     * @method Show\Field|Collection sodoncuoc(string $label = null)
     * @method Show\Field|Collection capdonhan(string $label = null)
     * @method Show\Field|Collection luotso(string $label = null)
     * @method Show\Field|Collection thangthua(string $label = null)
     * @method Show\Field|Collection bank_id(string $label = null)
     * @method Show\Field|Collection bank_name(string $label = null)
     * @method Show\Field|Collection banker(string $label = null)
     * @method Show\Field|Collection log_id(string $label = null)
     * @method Show\Field|Collection log(string $label = null)
     * @method Show\Field|Collection item(string $label = null)
     * @method Show\Field|Collection succeed(string $label = null)
     * @method Show\Field|Collection failed(string $label = null)
     * @method Show\Field|Collection operator(string $label = null)
     * @method Show\Field|Collection attempts(string $label = null)
     * @method Show\Field|Collection reserved_at(string $label = null)
     * @method Show\Field|Collection available_at(string $label = null)
     * @method Show\Field|Collection ng_description(string $label = null)
     * @method Show\Field|Collection ok_description(string $label = null)
     * @method Show\Field|Collection ng_time(string $label = null)
     * @method Show\Field|Collection ok_time(string $label = null)
     * @method Show\Field|Collection notifiable_type(string $label = null)
     * @method Show\Field|Collection notifiable_id(string $label = null)
     * @method Show\Field|Collection data(string $label = null)
     * @method Show\Field|Collection read_at(string $label = null)
     * @method Show\Field|Collection sn(string $label = null)
     * @method Show\Field|Collection part_id(string $label = null)
     * @method Show\Field|Collection service_id(string $label = null)
     * @method Show\Field|Collection issue(string $label = null)
     * @method Show\Field|Collection start(string $label = null)
     * @method Show\Field|Collection end(string $label = null)
     * @method Show\Field|Collection distribution(string $label = null)
     * @method Show\Field|Collection counts(string $label = null)
     * @method Show\Field|Collection software_id(string $label = null)
     * @method Show\Field|Collection todo_id(string $label = null)
     * @method Show\Field|Collection origin_json_string(string $label = null)
     * @method Show\Field|Collection priority(string $label = null)
     * @method Show\Field|Collection tags(string $label = null)
     * @method Show\Field|Collection done_description(string $label = null)
     * @method Show\Field|Collection emoji(string $label = null)
     * @method Show\Field|Collection location(string $label = null)
     * @method Show\Field|Collection contacts(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
