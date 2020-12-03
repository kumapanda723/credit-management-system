# アプリケーション名

取引先掛取引与信管理システム

# 概要

取引先の資本金、業績、過去の取引状況の登録から、それらのデータを元に算出した与信額、月次の返済処理までを管理できるシステムです。

# URL

http://credit-management-29255.herokuapp.com/

# テスト用アカウント

E-Mail Address : a@a  
Password : guest123

# 利用方法

ログイン後、「新規取引先登録ボタン」より取引先情報を登録。  
取引先一覧画面にて、登録されていることを確認。「掛取引登録ボタン」より取引金額と、返済期間月数を登録。   
ログイン後、「新規取引先登録ボタン」より取引先情報を登録。取引先一覧画面にて、登録されていることを確認。   
掛取引一覧



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
| credit_score               | integer    | null: false |
| credit_line                | integer    | null: false |
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
