
SELECT ap.voucher_type, COUNT( ap.id ) AS total
            FROM  `aero_passengers` ap
                LEFT JOIN aero_vouchers av ON av.id = ap.voucher_id
WHERE 
    av.voucher_created_at >= DATE_ADD(CURDATE(), INTERVAL -3 DAY);
GROUP BY ap.voucher_type