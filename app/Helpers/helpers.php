<?php

class FirstMan
{
	public static function source_name($source)
	{
		return DB::table('sources')->where('id', $source)->value('description');
	}

	public static function service_name($service)
	{
		return DB::table('services')->where('id', $service)->value('description');
	}

	public static function user_name($user)
	{
		return DB::table('users')->where('id', $user)->value('name');
	}

	public static function department_name($department)
	{
		return DB::table('departments')->where('id', $department)->value('name');
	}

	public static function vertical_name($vertical)
	{
		return DB::table('verticals')->where('id', $vertical)->value('name');
	}

	public static function follow_up()
	{
		return DB::table('sales')->where('status', '=', 'Follow up')->count();
	}

	public static function follow_up_today()
	{
		return DB::table('sales')->where('status', '=', 'Follow up')->where('next_follow_date', date('Y-m-d'))->count();
	}


	public static function close_sale()
	{
		return DB::table('sales')->where('status', '=', 'Closed')->count();
	}

	public static function sales()
	{
		return DB::table('sales')->where('status', '=', 'Sales')->count();
	}
}
