<?php

return [
    /*'combo_boolean' => [
        'xtype' => 'combo-boolean',
        'value' => true,
        'area' => 'gtsreview_main',
    ],*/
    'admin' => [
        'xtype' => 'textfield',
        'value' => '{
            "loadModels": "gtsreview",
            "selects": {
              "org": {
                "type": "autocomplect",
                "class": "gtsReviewOrg",
                "pdoTools": {
                  "class": "gtsReviewOrg",
                  "select": "gtsReviewOrg.id,gtsReviewOrg.name",
                  "sortby": {
                    "gtsReviewOrg.name": "ASC"
                  }
                },
                "where": {
                  "gtsReviewOrg.name:LIKE": "%query%"
                },
                "content": "{$name}"
              }
            },
            "tabs": {
              "Orgs": {
                "label": "Фирмы",
                "table": {
                  "class": "gtsReviewOrg",
                  "actions": {
                    "create": [],
                    "update": []
                  },
                  "pdoTools": {
                    "class": "gtsReviewOrg"
                  },
                  "checkbox": 1,
                  "autosave": 1,
                  "row": {
                    "id": {
                      "cls": "",
                      "edit": {
                        "type": "hidden"
                      }
                    },
                    "name": {
                      "label":"Имя",
                      "filter": 1
                    },
                    "site": {
                      "label":"Сайт",
                      "filter": 1
                    },
                    "manager": {
                      "label":"Фио менеджера",
                      "filter": 1
                    },
                    "description": {
                      "label":"Описание",
                      "edit": {
                        "type": "textarea",
                        "skip_sanitize": 0
                      }
                    }
                  }
                }
              },
              "Leed": {
                
                "label": "Сделки",
                "table": {
                  "subtables":{
                    "gtsReviewRewiev":{
                      "class":"gtsReviewRewiev",
                      "actions": {
                        "create": [],
                        "update": [],
                        "toggle":{
                            "field":"active"
                        },
                        "remove": []
                      },
                      "sub_where": {
                        "leed_id": "id"
                      },
                      "pdoTools": {
                        "class": "gtsReviewRewiev"
                      },
                      "checkbox": 1,
                      "autosave": 1,
                      "row": {
                        "id": {
                          "edit": {
                            "type": "hidden"
                          }
                        },
                        "leed_id": {
                          "label":"ID Сделки",
                            "edit": {
                              "type": "hidden"
                            }
                        },
                        
                        "question": {
                          "label":"Вопрос",
                          "edit": {
                            "type": "textarea",
                            "skip_sanitize": 0
                          }
                        },
                        "question_autor": {
                          "label":"Автор вопроса"
                        },
                        "question_date": {
                            "label":"Дата вопроса",
                            "filter": 1,
                            "edit": {
                                "type": "date"
                            }
                        },
                        "answer": {
                          "label":"Ответ",
                          "edit": {
                            "type": "textarea",
                            "skip_sanitize": 0
                          }
                        },
                        "answer_autor": {
                          "label":"Автор ответа"
                        },
                        "answer_date": {
                            "label":"Дата ответа",
                            "filter": 1,
                            "edit": {
                                "type": "date"
                            }
                        },
                        "active": {
                          "label":"Активно",
                            "filter": 1,
                            "edit": {
                                "type": "checkbox"
                            },
                            "default":1
                        }
                      }
                    }
                  },
                  "class": "gtsReviewLeed",
                  "actions": {
                    "create": [],
                    "update": [],
                    "subtable":{
                        "subtable_name":"gtsReviewRewiev"
                      },
                    "toggle":{
                        "field":"active"
                    },
                    "remove": []
                  },
                  "pdoTools": {
                    "class": "gtsReviewLeed",
                    "leftJoin":{
                        "gtsReviewOrg":{
                            "class":"gtsReviewOrg",
                            "on":"gtsReviewOrg.id = gtsReviewLeed.org_id"
                        }
                    },
                    "select":{
                        "gtsReviewLeed":"*",
                        "gtsReviewOrg":"gtsReviewOrg.name as org"
                    }
                  },
                  "checkbox": 1,
                  "autosave": 1,
                  "row": {
                    "id": {
                      "cls": "",
                      "edit": {
                        "type": "hidden"
                      }
                    },
                    "org_id":{
                      "label":"Фирма",
                      "filter": 1,
                      "edit":{
                          "type":"select",
                          "select":"org",
                          "field_content":"org"
                      }
                    },
                    "name": {
                      "label":"Название сделки",
                      "filter": 1
                    },
                    "date": {
                      "label":"Дата сделки",
                      "filter": 1,
                      "edit": {
                        "type": "date"
                      }
                    },
                    "description": {
                      "label":"Описание",
                      "edit": {
                        "type": "textarea",
                        "skip_sanitize": 0
                      }
                    },
                    "rating": {
                      "label":"Рейтинг",
                      "filter": 1
                    },
                    "active": {
                      "label":"Активно",
                        "filter": 1,
                        "edit": {
                            "type": "checkbox"
                        },
                        "default":1
                    }
                  }
                }
              }
            }
          }',
        'area' => 'gtsreview_main',
    ],
];