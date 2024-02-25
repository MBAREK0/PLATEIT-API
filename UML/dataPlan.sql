                classDiagram

                class User {
                + id: int
                + email: string
                + password: string
                + username: string
                + profile_image: string
                + points: int
                + following: List<Restaurant>
                + saved_posts: List<Publication>
                }

                class Restaurant {
                + id: int
                + name: string
                + address: string
                + phone_number: string
                + profile_image: string
                + website: string
                + category: string
                + menu: List<Menu>
                + points: int
                + followers: List<User>
                }

                class Menu {
                + id: int
                + name: string
                + description: string
                + price: float
                + image: string
                }

                class Publication {
                + id: int
                + user: User
                + restaurant: Restaurant
                + plate_name: string
                + image: string
                + description: string
                + date: Date
                + comments: List<Comment>
                + likes: List<User>
                }

                class Comment {
                + id: int
                + user: User
                + publication: Publication
                + content: string
                + date: Date
                }

                class Reward {
                + id: int
                + type: String
                + value: int
                + date: Date
                }  # for the Daily login rewards (5.10.20.40.80.160.320)
                    Rewards for creating posts or following restaurants (100) like(10) save(25) 
                    Rewards for ordering food (25)
                    Redeeming rewards for gifts or discounts (استبدال المكافآت بالهدايا أو الخصومات)


                class Gift {
                + id: int
                + name: string
                + description: string
                + points_cost: int
                + image: string
                }



                User         "1"        ----------->       "0..*" Publication
                User         "1"        ----------->       "0..*" Comment
                User         "1"        ----------->       "0..*" Reward
                Restaurant   "1"        ----------->       "0..*" Menu
                Restaurant   "1"        ----------->       "0..*" Publication
                Menu         "1"        ----------->       "0..*" Publication
                User         "0..*"     ----------->       "0..*" Restaurant : follows
                Publication  "0..*"     ----------->       "0..*" User : liked_by
                User         "0..*"     ----------->       "0..*" Gift : redeemed
                






                                                                                       