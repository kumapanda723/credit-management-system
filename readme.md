# アプリケーション名

取引先掛取引与信管理システム

# 概要

取引先の資本金、業績、過去の取引状況の登録から、それらのデータを元に算出した与信額、月次の返済処理までを管理できるシステムです。

# 信用スコア算出表

|  transaction_amount\months_of_term | 6months | 1year   | 3years  | 5years  | 7years  |
| ---------------------------------- | ------- | ------- | ------- | ------- | ------- |
| 1,000,000                          | -20     | -30     | -40     | -50     | -60     |
| 10,000,000                         | -5      | -10     | -20     | -30     | -40     |
| 50,000,000                         | -3      | -5      | -10     | -20     | -30     |
| 100,000,000                        | -1      | -3      | -5      | -10     | -20     |
| 1,000,000,000                      | 0       | -1      | -3      | -5      | -10     |

※支払い遅延が発生した場合は以下のマトリクスの通り信用スコアを減点する。ただし、初期値、つまり取引が無い場合の信用スコアは65点とする。

# 加重平均での計算方法

| trade_number | percentage | order   |
| ------------ | ---------- | ------- |
| 1            | 50%        | ↑newer  |
| 2            | 30%        |         |
| 3            | 20%        | ↓older  |

# 貸付枠の算出方法

資本金算出結果 = 資本金*0.1  
売上高算出結果 = 売上高(直近3期の加重平均)*0.4  
取引実績結果 = 取引実績(直近3期の加重平均)*0.9  

貸付枠 = {資本金算出結果*0.3 + 売上高算出結果*0.3 + 取引実績結果*0.4}*(100-信用スコア)/100

# URL

http://credit-management-29255.herokuapp.com/

# テスト用アカウント

E-Mail Address : guest@example.com  
Password : guest123

# 利用方法

ログイン後、「新規取引先登録ボタン」より取引先情報を登録。  
取引先一覧画面にて、登録されていることを確認。「掛取引登録ボタン」より取引金額と、返済期間月数を登録。    
掛取引一覧にて先程登録した掛取引が登録されていることを確認後、「月次返済処理ボタン」より入金対象月と入金額、返済時の遅延の有無を登録。  

## ユーザー管理機能


# テーブル設計

## ER図

https://lucid.app/lucidchart/230a7a1c-cbee-42e8-a56e-2f714186fc8b/view?page=0_0#?folder_id=home&browser=icon

## users テーブル 

| Column           | Type   | Options     |
| ---------------- | ------ | ----------- |
| name             | string | null: false |
| email            | string | null: false |
| password         | string | null: false |


### Association

- has_many :clients
- has_many :trades

## clients テーブル

| Column                     | Type       | Options     |
| ---------------------------| ---------- | ----------- |
| client_name                | string     | null: false |
| capital_amount             | integer    | null: false |
| annual_sales_1             | integer    | null: false |
| annual_sales_2             | integer    | null: false |
| annual_sales_3             | integer    | null: false |
| credit_score               | double     | null: false |
| credit_line                | double     | null: false |
| account_receivable_balance | integer    | null: false |


### Association

- belongs_to :user
- has_many :trades

## trades テーブル

| Column              | Type       | Options                        |
| ------------------- | ---------- | ------------------------------ |
| transaction_amount  | integer    | null: false                    |
| transaction_balance | integer    | null: false                    |
| months_of_term      | integer    | null: false                    |
| client_id           | references | null: false, foreign_key: true |                    |
| trade_score         | integer    | null: false                    |

### Association

- belongs_to :user
- belongs_to :client
- has_many :repayments

## repayments テーブル

| Column        | Type       | Options                        |
| ------------- | ---------- | ------------------------------ |
| payment_month | integer    | null: false                    |
| trade_id      | references | null: false, foreign_key: true |
| amount        | integer    | null: false                    |
| delay_flag    | integer    | null: false                    |
| credit_minus  | integer    | null: false                    |

### Association

- belongs_to :trade

# ローカルでの動作方法

php 7.3.22
Laravel 4.1.1
