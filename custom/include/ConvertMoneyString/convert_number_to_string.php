<?php

    class Integer {

        public function toText($amt) {
            if (is_numeric($amt)) {
                $sign = $amt >= 0 ? '' : 'Negative ';
                $rs = $sign . $this->toQuadrillions(abs($amt)) . " ";
                $rs = str_replace('  ',' ',$rs);
                $rs = trim($rs);
                //$rs = strtolower($rs);
                $rs[0] = strtoupper($rs[0]);
                $rs = str_replace('mươi một','mươi mốt',$rs);
                return $rs.=' đồng.';
            } else {
                throw new Exception('Only numeric values are allowed.');
            }
        }

        private function toOnes($amt) {
            $words = array(
                0 => 'không',
                1 => 'một',
                2 => 'hai',
                3 => 'ba',
                4 => 'bốn',
                5 => 'năm',
                6 => 'sáu',
                7 => 'bảy',
                8 => 'tám',
                9 => 'chín'
            );

            if ($amt >= 0 && $amt < 10)
                return $words[$amt];
            else
                throw new ArrayIndexOutOfBoundsException('Array Index not defined');
        }

        private function toTens($amt) { // handles 10 - 99
            $firstDigit = intval($amt / 10);
            $remainder = $amt % 10;

            if ($firstDigit == 1) {
                $words = array(
                    0 => 'mười',
                    1 => 'mười một',
                    2 => 'mười hai',
                    3 => 'mười ba',
                    4 => 'mười bốn',
                    5 => 'mười lăm',
                    6 => 'mười sáu',
                    7 => 'mười bảy',
                    8 => 'mười tám',
                    9 => 'mười chín'
                );

                return $words[$remainder];
            } else if ($firstDigit >= 2 && $firstDigit <= 9) {
                $words = array(
                    2 => 'hai mươi',
                    3 => 'ba mươi',
                    4 => 'bốn mươi',
                    5 => 'năm mươi',
                    6 => 'sáu mươi',
                    7 => 'bảy mươi',
                    8 => 'tám mươi',
                    9 => 'chín mươi'
                );

                $rest = $remainder == 0 ? '' : $this->toOnes($remainder);
                return $words[$firstDigit] . ' ' . $rest;
            }
            else
                return $this->toOnes($amt);
        }

        private function toHundreds($amt) {
            $ones = intval($amt / 100);
            $remainder = $amt % 100;

            if ($ones >= 1 && $ones < 10) {
                $rest = $remainder == 0 ? '' : $this->toTens($remainder);
                return $this->toOnes($ones) . ' trăm ' . $rest;
            }
            else
                return $this->toTens($amt);
        }

        private function toThousands($amt) {
            $hundreds = intval($amt / 1000);
            $remainder = $amt % 1000;

            if ($hundreds >= 1 && $hundreds < 1000) {
                $rest = $remainder == 0 ? '' : $this->toHundreds($remainder);
                return $this->toHundreds($hundreds) . ' nghìn ' . $rest;
            }
            else
                return $this->toHundreds($amt);
        }

        private function toMillions($amt) {
            $hundreds = intval($amt / pow(1000, 2));
            $remainder = $amt % pow(1000, 2);

            if ($hundreds >= 1 && $hundreds < 1000) {
                $rest = $remainder == 0 ? '' : $this->toThousands($remainder);
                return $this->toHundreds($hundreds) . ' triệu ' . $rest;
            }
            else
                return $this->toThousands($amt);
        }

        private function toBillions($amt) {
            $hundreds = intval($amt / pow(1000, 3));
            /* Note:taking the modulos results in a negative value, but
            this seems to work pretty fine */

            $remainder = $amt - $hundreds * pow(1000, 3);

            if ($hundreds >= 1 && $hundreds < 1000) {
                $rest = $remainder == 0 ? '' : $this->toMillions($remainder);
                return $this->toHundreds($hundreds) . ' tỷ ' . $rest;
            }
            else
                return $this->toMillions($amt);
        }

        private function toTrillions($amt) {
            $hundreds = intval($amt / pow(1000, 4));
            $remainder = $amt - $hundreds * pow(1000, 4);

            if ($hundreds >= 1 && $hundreds < 1000) {
                $rest = $remainder == 0 ? '' : $this->toBillions($remainder);
                return $this->toHundreds($hundreds) . ' nghìn tỷ ' . $rest;
            }
            else
                return $this->toBillions($amt);
        }

        private function toQuadrillions($amt) {
            $hundreds = intval($amt / pow(1000, 5));
            $remainder = $amt - $hundreds * pow(1000, 5);

            if ($hundreds >= 1 && $hundreds < 1000) {
                $rest = $remainder == 0 ? '' : $this->toTrillions($remainder);
                return $this->toHundreds($hundreds) . ' Nghìn Triệu Triệu ' . $rest;
            }
            else
                return $this->toTrillions($amt);
        }

    }
?>