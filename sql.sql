  SELECT
            count(ap.id) as total_pax,
            DAY(voucher_created_at) as hari
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE 
            ap.id = ? 
            AND YEAR(voucher_created_at) = ?
            AND MONTH(voucher_created_at) = ?
        GROUP BY hari
        ORDER BY hari ASC


SELECT
*
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE 
            ap.id = 2 
            AND YEAR(voucher_created_at) = 2012
            AND MONTH(voucher_created_at) = 2