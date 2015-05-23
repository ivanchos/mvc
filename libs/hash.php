<?php
class Hash
	{
		/**
		 *
		 * @param string $algo - the algorithm (md5, sha1, whirlpool...)
		 * @param string $data - the data (message)to encode
		 * @param string $salt - the salt (should be the same through the project)
		 * @return string - the hashed/salted data
		 */
		public static function create($algo, $data, $salt)
			{
				$context = hash_init($algo, HASH_HMAC, $salt);
				hash_update($context, $data);
				return hash_final($context);
			}
	}